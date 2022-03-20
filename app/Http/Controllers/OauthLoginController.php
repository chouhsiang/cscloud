<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\OIDCProviderService;

class OauthLoginController extends Controller
{
    //
    protected $provider;

    public function login(OIDCProviderService $service){
        if (!Auth::user()){
            $this->provider = $service->getProvider();
            $url = $this->provider->getAuthorizationUrl();
            session()->flash('oidc-auth.state', $this->provider->getState());
            return redirect($url);
        } else {
            Auth::logout();
            session()->reflash();
            dd(session());
        }
    }
    public function logout(){
        Auth::logout();
        session()->reflash();
        return view('auth.logout');
    }
}
