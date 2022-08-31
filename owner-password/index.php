<?php
header('Content-Type: application/json');

class App {
    /** Route constants */
    const HOME = '/';
    const AUTH_SERVER = "auth_server";

    /**
     * @var routeUri
     * @desc - Data member representing the current route uri
     */
    private $routeUri = "/";

    function __construct(string $requestUrl) {
        $pathNames = explode('/', $requestUrl);
        $this->routeUri = $pathNames[sizeof($pathNames) - 1];
    }

    public function switchRoute(){
        switch($this->routeUri) {
            case self::HOME:
            case '':
                echo "Welcome to OAuth2 Server!";
                break;

            case self::AUTH_SERVER:
                $relativePath = self::AUTH_SERVER . ".php";
                require __DIR__ . "/{$relativePath}";
                break;
            
            default:
                http_response_code(404);
                echo "Not Found - 404";
                break;
        }
        echo "\n";
    }
}

$app = new App($_SERVER['REQUEST_URI']);
$app->switchRoute();
