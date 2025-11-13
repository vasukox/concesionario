<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Vehicle.php';

class VehicleController {
    private $db;
    private $vehicle;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->vehicle = new Vehicle($this->db);
    }

    // Mostrar formulario de creación
    public function showCreateForm() {
        include __DIR__ . '/../views/create.php';
    }

    // Crear vehículo
    public function create() {
        if($_POST) {
            $this->vehicle->nombre = $_POST['nombre'];
            $this->vehicle->modelo = $_POST['modelo'];
            $this->vehicle->fabricante = $_POST['fabricante'];
            $this->vehicle->pais = $_POST['pais'];

            // Limpiar el precio - ahora es un input type="number" que viene limpio
            $this->vehicle->precio = floatval($_POST['precio']);
            $this->vehicle->descripcion = $_POST['descripcion'] ?? '';
            $this->vehicle->calificacion = intval($_POST['calificacion']);

            // Manejo de la imagen
            $imagen_nombre = "";
            if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
                $target_dir = __DIR__ . "/../public/uploads/";

                // Crear directorio si no existe
                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }

                $imagen_nombre = time() . '_' . basename($_FILES["imagen"]["name"]);
                $target_file = $target_dir . $imagen_nombre;

                // Validar tipo de archivo
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $allowed_types = array("jpg", "jpeg", "png", "gif", "webp");

                if(in_array($imageFileType, $allowed_types)) {
                    if(move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
                        $this->vehicle->imagen = $imagen_nombre;
                    } else {
                        error_log("Error al mover archivo: " . $_FILES["imagen"]["tmp_name"] . " a " . $target_file);
                    }
                } else {
                    error_log("Tipo de archivo no permitido: " . $imageFileType);
                }
            } else if(isset($_FILES['imagen'])) {
                error_log("Error en upload de imagen: " . $_FILES['imagen']['error']);
            }

            if($this->vehicle->create()) {
                header("Location: index.php?action=list&msg=created");
                exit();
            } else {
                echo "<div class='alert alert-danger'>No se pudo crear el vehículo.</div>";
            }
        }
    }

    // Listar todos los vehículos
    public function listAll() {
        $stmt = $this->vehicle->readAll();
        include __DIR__ . '/../views/list.php';
    }

    // Mostrar formulario de edición
    public function showEditForm($id) {
        $this->vehicle->id = $id;
        if($this->vehicle->readOne()) {
            include __DIR__ . '/../views/edit.php';
        } else {
            header("Location: index.php?action=list&msg=notfound");
        }
    }

    // Actualizar vehículo
    public function update() {
        if($_POST) {
            $this->vehicle->id = $_POST['id'];

            // Guardar los valores nuevos ANTES de readOne()
            $nombre_nuevo = $_POST['nombre'];
            $modelo_nuevo = $_POST['modelo'];
            $fabricante_nuevo = $_POST['fabricante'];
            $pais_nuevo = $_POST['pais'];
            $precio_nuevo = floatval($_POST['precio']);
            $descripcion_nueva = $_POST['descripcion'] ?? '';
            $calificacion_nueva = intval($_POST['calificacion']);

            // Obtener imagen actual
            $this->vehicle->readOne();
            $imagen_actual = $this->vehicle->imagen;

            // Restaurar los valores nuevos DESPUÉS de readOne()
            $this->vehicle->nombre = $nombre_nuevo;
            $this->vehicle->modelo = $modelo_nuevo;
            $this->vehicle->fabricante = $fabricante_nuevo;
            $this->vehicle->pais = $pais_nuevo;
            $this->vehicle->precio = $precio_nuevo;
            $this->vehicle->descripcion = $descripcion_nueva;
            $this->vehicle->calificacion = $calificacion_nueva;

            // Manejo de nueva imagen
            if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
                $target_dir = __DIR__ . "/../public/uploads/";
                $imagen_nombre = time() . '_' . basename($_FILES["imagen"]["name"]);
                $target_file = $target_dir . $imagen_nombre;

                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $allowed_types = array("jpg", "jpeg", "png", "gif");

                if(in_array($imageFileType, $allowed_types)) {
                    if(move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
                        // Eliminar imagen anterior
                        if($imagen_actual && file_exists($target_dir . $imagen_actual)) {
                            unlink($target_dir . $imagen_actual);
                        }
                        $this->vehicle->imagen = $imagen_nombre;
                    }
                }
            } else {
                $this->vehicle->imagen = $imagen_actual;
            }

            if($this->vehicle->update()) {
                header("Location: index.php?action=list&msg=updated");
                exit();
            } else {
                echo "<div class='alert alert-danger'>No se pudo actualizar el vehículo.</div>";
            }
        }
    }

    // Eliminar vehículo
    public function delete($id) {
        $this->vehicle->id = $id;
        
        // Obtener datos del vehículo para eliminar la imagen
        if($this->vehicle->readOne()) {
            $imagen = $this->vehicle->imagen;
            
            if($this->vehicle->delete()) {
                // Eliminar imagen del servidor
                if($imagen) {
                    $target_dir = __DIR__ . "/../public/uploads/";
                    if(file_exists($target_dir . $imagen)) {
                        unlink($target_dir . $imagen);
                    }
                }
                header("Location: index.php?action=list&msg=deleted");
                exit();
            }
        }
        
        header("Location: index.php?action=list&msg=error");
    }

    // Mostrar vista móvil
    public function showMobileView() {
        $stmt = $this->vehicle->readAll();
        include __DIR__ . '/../views/displayMobile.php';
    }

    // API para obtener datos en JSON (para móvil)
    public function getVehiclesJSON() {
        $stmt = $this->vehicle->readAll();
        $vehicles_arr = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $vehicle_item = array(
                "id" => $id,
                "nombre" => $nombre,
                "modelo" => $modelo,
                "fabricante" => $fabricante,
                "pais" => $pais,
                "precio" => $precio,
                "imagen" => $imagen
            );
            array_push($vehicles_arr, $vehicle_item);
        }

        header('Content-Type: application/json');
        echo json_encode($vehicles_arr);
    }
}
?>