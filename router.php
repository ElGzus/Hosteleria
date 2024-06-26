<?php
session_start();
require "controllers/AccommodationController.php";
require "controllers/UserController.php";
require "controllers/AdminController.php";

$request = $_SERVER["REQUEST_URI"];

switch ($request) {
    case "/":
        $controller = new AccommodationController();
        $controller->create();
        break;
    case "/register":
        $controller = new UserController();
        $controller->register();
        break;
    case "/login":
        $controller = new UserController();
        $controller->login();
        break;
    case "/account":
        $controller = new UserController();
        $controller->account();
        break;
    case "/admin":
        $controller = new AdminController();
        $controller->enable();
        break;
    case "/logout":
        $controller = new UserController();
        $controller->logout();
        break;
    default:
        http_response_code(404);
        require "views/404.php";
        break;
}
?>