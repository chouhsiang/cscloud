<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\OIDCProviderService;

class OauthLoginController extends Controller
{
    //
    protected $provider;

    public function __construct(OIDCProviderService $service)
    {
        $this->provider = $service->getProvider();
    }

    public function login(OIDCProviderService $service){
        if (!Auth::user()){
            $url = $this->provider->getAuthorizationUrl();
            session()->flash('oidc-auth.state', $this->provider->getState());
            return redirect($url);
        } else {
            return redirect(route('home'));
        }
    }
    public function logout(){
        Auth::logout();
        session()->reflash();
        return view('auth.logout');
    }
}
