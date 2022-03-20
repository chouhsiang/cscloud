<?php
$oidc_server = 'https://oauth.cs.nctu.edu.tw';
$oidc_pubkey = <<<END
-----BEGIN PUBLIC KEY-----
MIICIjANBgkqhkiG9w0BAQEFAAOCAg8AMIICCgKCAgEA4wKBX0b58GApQgYFidEB
xQohn7x6RAJTp2VE1q2p94NwGs95dgrD+e8fKYMhgFDfGCKujxq9nUBYrdujj5g+
c5oqFF5OEO+KN+ShEDFEeI0NUpc4hO+oUbyvPaW/y5i9ixUp90wc5f7OeQTqSqDY
NRAjg0akFu0uembxIgfWcV4dUg0rK+GanuqNUmMnRS6xJBqyrxWggo02V+PYTQBK
VJui155Q0iFDPDV/uqnnGG6QxeNArKedhEPJoDqiCWLGw9XLzUSaNz2M/7gYcO6w
wxiVe2phiCGJfFlDzW/rJlGfWLfzMGo7rtUYZyhrVo6UtulhXaRNdMe+g8YaT9KD
tzX41seYQ/CWZnGvAF4gQv9N63+tGkOTFlbGFzoCirIclXVQgp7naV4gnsB7f3Tt
wxluG+LtpXZ77ddQJ1wx9ey3i1PrdveWJPhv5ySJmpB3OWWikL0HhYzVBqJ+p98a
J7xRA0swL+ngI5MNA6cMxTDO4dGCbTi+/Wjz8pT6jTGuOccc/7O6krcvIMof+oly
BVQW2vAmwoFWCjfgEHJh1ih8Eq7y+btL473xMsp97WlklusOg46IfEkI0cLIV/AA
xbiYnx23ZBfIQUXnWfEDsDRn0a6mnCHxjzUjse37kbmrinn8ge7TYtqIBwQhTXmR
heEmEickfD6FmvKzbSCzNbcCAwEAAQ==
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
        'idTokenIssuer' => $oidc_server,
        'urlAuthorize' => $oidc_server . '/oauth/authorize',
        'urlAccessToken' => $oidc_server . '/oauth/token',
        'urlResourceOwnerDetails' => $oidc_server . '/api/me',
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
        'groups',
        'uid'
    ],
];
