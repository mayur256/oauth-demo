<?php
header('Content-Type: application/json');

class App {
    public function sayHello() {
        $welcomeMsg = "Hello World!";
        echo $welcomeMsg;
        echo "\n";
    }
}

$app = new App();
$app->sayHello();
