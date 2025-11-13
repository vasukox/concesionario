<?php
require_once __DIR__ . '/../config/database.php';

$database = new Database();
$db = $database->getConnection();

echo "<h2>Estado Actual de la Base de Datos</h2>";

// Ver todos los vehículos
$stmt = $db->query('SELECT * FROM vehiculos ORDER BY id');
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>ID</th><th>Nombre</th><th>Modelo</th><th>Fabricante</th><th>País</th><th>Precio (BD)</th><th>Precio Formateado</th></tr>";

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['nombre'] . "</td>";
    echo "<td>" . $row['modelo'] . "</td>";
    echo "<td>" . $row['fabricante'] . "</td>";
    echo "<td>" . $row['pais'] . "</td>";
    echo "<td>" . $row['precio'] . " (" . gettype($row['precio']) . ")</td>";
    echo "<td>$" . number_format($row['precio'], 2) . "</td>";
    echo "</tr>";
}
echo "</table>";

// Intentar actualizar el registro
echo "<h2>Probando Actualización</h2>";
$id = 5; // ID del jetta
$nuevo_precio = 35000.00;

$query = "UPDATE vehiculos SET precio = :precio WHERE id = :id";
$stmt = $db->prepare($query);
$stmt->bindParam(':precio', $nuevo_precio);
$stmt->bindParam(':id', $id);

if($stmt->execute()) {
    echo "<p style='color:green;'>✓ Actualización exitosa! Precio actualizado a $" . number_format($nuevo_precio, 2) . "</p>";

    // Verificar
    $stmt = $db->query("SELECT id, nombre, precio FROM vehiculos WHERE id = $id");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "<p>Valor verificado: " . $row['nombre'] . " - $" . number_format($row['precio'], 2) . "</p>";
} else {
    echo "<p style='color:red;'>✗ Error en la actualización</p>";
}

echo "<br><a href='index.php?action=list'>Volver al catálogo</a>";
?>
