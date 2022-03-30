<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\OIDCProviderService;
use App\Services\UserService;
use App\Models\User;

class CallbackController extends Controller
{
    protected $provider;

    public function __construct(OIDCProviderService $service)
    {
        $this->provider = $service->getProvider();
    }

    public function callback(Request $request)
    {
        $error = $request->get('error');
        if (!is_null($error)) {
            throw new AuthenticationErrorException($error);
        }
        
        if ($request->get('state') !== session('oidc-auth.state')) {
            abort(403, 'state mismatch or missing');
        }
        
        if (!$request->has('code')) {
            throw new AuthenticationException('No authorization code received');
        }
        $token = $this->provider->getAccessToken('authorization_code', [
            'code' => $request->get('code'),
        ]);
        
        $required = config('oidc-auth.required_claims');
        
        session(['oidc-auth.access_token' => $token]);
        
        $user = User::where('uid', $token->getIdToken()->getClaim('id'))->first();
        $userData = [
            'uid' => $token->getIdToken()->getClaim($required['id']),
            'name' => $token->getIdToken()->getClaim($required['chinese_name']),
            'username' => $token->getIdToken()->getClaim($required['uid']),
            'email' => $token->getIdToken()->getClaim($required['email']) . '@cs.nycu.edu.tw',
            //'remember_token' => strval($token->getToken())
        ];
        if (!isset($user)) {
            UserService::firstOrCreateUser($userData);
            $user = User::where('uid', $userData['uid'])->first();
        }

        Auth::loginUsingId($user['id']);

        return redirect()->route('home');
    }
}
