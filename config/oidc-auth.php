<?php
$oidc_pubkey = <<<END
-----BEGIN PUBLIC KEY-----
OIDC publickey
-----END PUBLIC KEY-----
END;

return [
    /*
    |--------------------------------------------------------------------------
    | OIDC Provider Config
    |--------------------------------------------------------------------------
    |
    | This options to pass to OpenIDConnectClient\OpenIDConnectProvider.
    | `redirectUri` will be determined automatically by `callback_route` below.
    | `urlResourceOwnerDetails` is unused by us.
    | `publicKey` is in PEM format, either the content or `file://` to read
    |  from file.
    |
     */
    'provider' => [
        'clientId' => env('OIDC_CLIENT_ID'),
        'clientSecret' => env('OIDC_CLIENT_SECRET'),
        'idTokenIssuer' => env('OIDC_SERVER'),
        'urlAuthorize' => env('OIDC_SERVER') . '/oauth/authorize',
        'urlAccessToken' => env('OIDC_SERVER') . '/oauth/token',
        'urlResourceOwnerDetails' => env('OIDC_SERVER') . '/api/me',
        'scopes' => ['openid', 'profile', 'groups', 'is-cs-ta', 'csid'],
        'publicKey' => $oidc_pubkey,
    ],

    /*
    |--------------------------------------------------------------------------
    | Callback Route
    |--------------------------------------------------------------------------
    |
    | Callback route used by Authrization Code flow.
    |
     */
    'callback_route' => '/oidc/callback',

    /*
    |--------------------------------------------------------------------------
    | Authenticatable Factory
    |--------------------------------------------------------------------------
    |
    | Factory to get a Illuminate\Contracts\Auth\Authenticatable to use, see
    | LaravelOIDCAuth\UserFactoryInterface.
    | For example, you can use a Eloquent model as Authenticatable to store
    | user information in DB.
    | A OpenIDConnectClient\AccessToken will be passed to authenticable()
    |
     */
    'authenticatable_factory' => \LaravelOIDCAuth\UserFactory::class,

    /*
    |--------------------------------------------------------------------------
    | Required Claims
    |--------------------------------------------------------------------------
    |
    | JWT claims in id_token required to authenticate. Arrays set required
    | elements in an array. First Login get user info claims write to database.
    |
    | This can also be a Closure to check id_token. id_token will be passed as
    | the first parameter. Return true to claims value.
    |
     */
    'required_claims' => [
        'uid' => 'uid',
        'id' => 'id',
        'email' => 'id',
        'chinese_name' => 'chinese_name',
    ],
];
