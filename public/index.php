<?php
require_once __DIR__ . '/../controllers/VehicleController.php';

$controller = new VehicleController();

// Obtener la acción de la URL
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

// Enrutador simple
switch($action) {
    case 'create':
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->create();
        } else {
            $controller->showCreateForm();
        }
        break;
    
    case 'list':
        $controller->listAll();
        break;
    
    case 'edit':
        if(isset($_GET['id'])) {
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller->update();
            } else {
                $controller->showEditForm($_GET['id']);
            }
        }
        break;
    
    case 'delete':
        if(isset($_GET['id'])) {
            $controller->delete($_GET['id']);
        }
        break;
    
    case 'mobile':
        $controller->showMobileView();
        break;
    
    case 'api':
        $controller->getVehiclesJSON();
        break;
    
    default:
        $controller->listAll();
        break;
}
?>