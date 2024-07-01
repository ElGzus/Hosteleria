<?php
session_start();
require_once "/controllers/UserController.php";
require_once "/controllers/AccommodationController.php";
require_once "/controllers/AdminController.php";

$userController = new UserController();
$accommodationController = new AccommodationController();
$adminController = new AdminController();

$request = $_SERVER['REQUEST_URI'];
$request = strtok($request, '?');

switch ($request) {
    case '':
    case '/':
    case 'index':
        // Redirigir a la página de login por defecto
        header('Location: ./views/login.php');
        break;
    case '/register' :
        $userController->register();
        break;
    case '/login' :
        $userController->login();
        break;
    case '/logout' :
        $userController->logout();
        break;
    case '/account' :
        $userController->account();
        break;
    case '/admin' :
        $adminController->enable();
        break;
    case '/accommodation/create' :
        $accommodationController->create();
        break;
    case '/accommodation/read' :
        $accommodationController->read();
        break;
    case (preg_match('/\/accommodation\/update\/(\d+)/', $request, $matches) ? true : false) :
        $accommodationController->update($matches[1]);
        break;
    case (preg_match('/\/accommodation\/reserve\/(\d+)/', $request, $matches) ? true : false) :
        $accommodationController->reserve($matches[1]);
        break;
    case (preg_match('/\/accommodation\/unreserve\/(\d+)/', $request, $matches) ? true : false) :
        $accommodationController->unreserve($matches[1]);
        break;
    default:
        http_response_code(404);
        include 'views/404.php';
        break;
}
?>