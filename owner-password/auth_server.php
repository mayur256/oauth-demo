<?php

require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/autoload.php";

// Initialize our repositories
$clientRepository = new ClientRepository(); // instance of ClientRepositoryInterface
$scopeRepository = new ScopeRepository(); // instance of ScopeRepositoryInterface
$accessTokenRepository = new AccessTokenRepository(); // instance of AccessTokenRepositoryInterface
$userRepository = new UserRepository(); // instance of UserRepositoryInterface
$refreshTokenRepository = new RefreshTokenRepository(); // instance of RefreshTokenRepositoryInterface

// Path to public and private keys
$privateKey = realpath('./keys/private.key');
$privateKey = 'file://' . $privateKey;

// generate using base64_encode(random_bytes(32))
$encryptionKey = base64_encode(random_bytes(32));

// Setup the authorization server
$server = new \League\OAuth2\Server\AuthorizationServer(
    $clientRepository,
    $accessTokenRepository,
    $scopeRepository,
    $privateKey,
    $encryptionKey
);

// Specifies the grant type
$grant = new \League\OAuth2\Server\Grant\PasswordGrant(
     $userRepository,
     $refreshTokenRepository
);

// sets refresh token expiry to 1 month
$grant->setRefreshTokenTTL(new \DateInterval('P1M'));

// Enable the password grant on the server
$server->enableGrantType(
    $grant,
    new \DateInterval('PT1H') // access tokens will expire after 1 hour
);
