<?php
require_once './controllers/AccommodationController.php';
$controller = new AccommodationController();

$action = isset($_GET['action']) ? $_GET['action'] : 'read';
$id = isset($_GET['id']) ? $_GET['id'] : null;

switch($action){
    case 'read':
        $controller->read();
        break;
    case 'create':
        $controller->create();
        break;
    case 'update':
        $controller->update($id);
        break;
    case 'reserve':
        $controller->reserve($id);
        break;
    case 'unreserve':
        $controller->unreserve($id);
        break;
    default:
        $controller->read();
        break;
}
?>
