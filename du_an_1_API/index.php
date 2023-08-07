<?php
    declare(strict_types=1);

    spl_autoload_register(function ($class) {
        require __DIR__ . "/src/$class.php";
    });

    set_error_handler("ErrorHandler::handleError");
    set_exception_handler(("ErrorHandler::handleException"));

    header("Content-Type: application/json; charset=UTF-8");

    $parts = explode("/", $_SERVER["REQUEST_URI"]);
    // echo "<pre>";
    // print_r($parts);
    if(!strstr($parts[2], "giohang")) {
        http_response_code(404);
        exit;
    }
    $id = $parts[3] ?? null;

    $database = new Database("localhost", "food_market", "root", "");
    $database->getConnection();

    $gateway = new ProductGateway($database);

    $conreoller = new ProductController($gateway);

    $conreoller->processRequest($_SERVER['REQUEST_METHOD'], $id);
?>