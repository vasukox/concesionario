<?php
class Vehicle {
    private $conn;
    private $table_name = "vehiculos";

    public $id;
    public $nombre;
    public $modelo;
    public $fabricante;
    public $pais;
    public $precio;
    public $descripcion;
    public $calificacion;
    public $imagen;
    public $fecha_creacion;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Crear un nuevo vehículo (CREATE)
    public function create() {
        $query = "INSERT INTO " . $this->table_name . "
                  SET nombre=:nombre, modelo=:modelo, fabricante=:fabricante,
                      pais=:pais, precio=:precio, descripcion=:descripcion,
                      calificacion=:calificacion, imagen=:imagen";

        $stmt = $this->conn->prepare($query);

        // Limpiar datos
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->modelo = htmlspecialchars(strip_tags($this->modelo));
        $this->fabricante = htmlspecialchars(strip_tags($this->fabricante));
        $this->pais = htmlspecialchars(strip_tags($this->pais));
        $this->precio = htmlspecialchars(strip_tags($this->precio));
        $this->descripcion = htmlspecialchars(strip_tags($this->descripcion));
        $this->calificacion = htmlspecialchars(strip_tags($this->calificacion));
        $this->imagen = htmlspecialchars(strip_tags($this->imagen));

        // Vincular valores
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":modelo", $this->modelo);
        $stmt->bindParam(":fabricante", $this->fabricante);
        $stmt->bindParam(":pais", $this->pais);
        $stmt->bindParam(":precio", $this->precio);
        $stmt->bindParam(":descripcion", $this->descripcion);
        $stmt->bindParam(":calificacion", $this->calificacion);
        $stmt->bindParam(":imagen", $this->imagen);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Leer todos los vehículos (READ)
    public function readAll() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY fecha_creacion DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Leer un vehículo específico (READ ONE)
    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row) {
            $this->nombre = $row['nombre'];
            $this->modelo = $row['modelo'];
            $this->fabricante = $row['fabricante'];
            $this->pais = $row['pais'];
            $this->precio = $row['precio'];
            $this->descripcion = $row['descripcion'];
            $this->calificacion = $row['calificacion'];
            $this->imagen = $row['imagen'];
            $this->fecha_creacion = $row['fecha_creacion'];
            return true;
        }
        return false;
    }

    // Actualizar un vehículo (UPDATE)
    public function update() {
        $query = "UPDATE " . $this->table_name . "
                  SET nombre=:nombre, modelo=:modelo, fabricante=:fabricante,
                      pais=:pais, precio=:precio, descripcion=:descripcion,
                      calificacion=:calificacion, imagen=:imagen
                  WHERE id=:id";

        $stmt = $this->conn->prepare($query);

        // Limpiar datos
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->modelo = htmlspecialchars(strip_tags($this->modelo));
        $this->fabricante = htmlspecialchars(strip_tags($this->fabricante));
        $this->pais = htmlspecialchars(strip_tags($this->pais));
        $this->precio = htmlspecialchars(strip_tags($this->precio));
        $this->descripcion = htmlspecialchars(strip_tags($this->descripcion));
        $this->calificacion = htmlspecialchars(strip_tags($this->calificacion));
        $this->imagen = htmlspecialchars(strip_tags($this->imagen));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Vincular valores
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":modelo", $this->modelo);
        $stmt->bindParam(":fabricante", $this->fabricante);
        $stmt->bindParam(":pais", $this->pais);
        $stmt->bindParam(":precio", $this->precio);
        $stmt->bindParam(":descripcion", $this->descripcion);
        $stmt->bindParam(":calificacion", $this->calificacion);
        $stmt->bindParam(":imagen", $this->imagen);
        $stmt->bindParam(":id", $this->id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Eliminar un vehículo (DELETE)
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(1, $this->id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Buscar vehículos
    public function search($keyword) {
        $query = "SELECT * FROM " . $this->table_name . " 
                  WHERE nombre LIKE ? OR fabricante LIKE ? OR pais LIKE ? 
                  ORDER BY fecha_creacion DESC";

        $stmt = $this->conn->prepare($query);
        $keyword = "%{$keyword}%";
        $stmt->bindParam(1, $keyword);
        $stmt->bindParam(2, $keyword);
        $stmt->bindParam(3, $keyword);
        $stmt->execute();

        return $stmt;
    }
}
?>