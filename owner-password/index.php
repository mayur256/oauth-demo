<?php
header('Content-Type: application/json');

class App {
    /** Route constants */
    const HOME = '/';
    const OWNER_PASS = "password";

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
                echo "Hello World!";
                break;

            case self::OWNER_PASS:
                require __DIR__ . "/password.php";
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
