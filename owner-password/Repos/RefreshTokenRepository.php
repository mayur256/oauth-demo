<?php

use League\OAuth2\Server\Entities\RefreshTokenEntityInterface;
use League\OAuth2\Server\Repositories\RefreshTokenRepositoryInterface;
use OAuth2ServerExamples\Entities\RefreshTokenEntity;

class RefreshTokenRepository implements RefreshTokenRepositoryInterface {

    public function persistNewRefreshToken(RefreshTokenEntityInterface $refreshTokenEntity) {
        // Some logic to persist the refresh token in a database
    }

    
    public function revokeRefreshToken($tokenId) {
        // Some logic to revoke the refresh token in a database
    }

    public function isRefreshTokenRevoked($tokenId) {
        return false; // The refresh token has not been revoked
    }


    public function getNewRefreshToken() {
        return new RefreshTokenEntity();
    }
}
