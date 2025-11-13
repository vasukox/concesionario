<?php
// Safe bootstrap: check DB connection before loading controller so the app
// doesn't fatal when deployed to environments without a configured DB (like Vercel).
require_once __DIR__ . '/../config/database.php';

$database = new Database();
$dbConn = $database->getConnection();

if ($dbConn === null) {
    // No DB available: show a friendly info page instead of loading the app.
    include __DIR__ . '/../views/no_db.php';
    exit();
}

// If DB exists, proceed to load controller which expects a working DB.
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