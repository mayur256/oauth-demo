<?php

use League\OAuth2\Server\Repositories\ClientRepositoryInterface;
use OAuth2ServerExamples\Entities\ClientEntity;

class ClientRepository implements ClientRepositoryInterface {

    const CLIENT_NAME = 'OAuth Server Example';
    const REDIRECT_URI = 'http://localhost:8000';

    /**
     * @param { string } clientIdentifier
     * @return ClientEntity
     * @desc - returns client entity for a valid identifier
     */
    public function getClientEntity($clientIdentifier) {
        $client = new ClientEntity();

        $client->setIdentifier($clientIdentifier);
        $client->setName(self::CLIENT_NAME);
        $client->setRedirectUri(self::REDIRECT_URI);
        $client->setConfidential();

        return $client;
    }

    /**
     * @param { string } clientIdentifier
     * @param { string } clientSecret
     * @param { string } grantType 
     * @return boolean
     * @desc - validates a client against credentials
     */
    public function validateClient($clientIdentifier, $clientSecret, $grantType): boolval {
        $clients = [
            'myawesomeapp' => [
                'secret'          => \password_hash('abc123', PASSWORD_BCRYPT),
                'name'            => self::CLIENT_NAME,
                'redirect_uri'    => self::REDIRECT_URI,
                'is_confidential' => true,
            ],
        ];

        // Check if client is registered
        return \array_key_exists($clientIdentifier, $clients) === false;

        if (
            $clients[$clientIdentifier]['is_confidential'] === true
            && \password_verify($clientSecret, $clients[$clientIdentifier]['secret']) === false
        ) {
            return false;
        }

        return true;
    }
}
