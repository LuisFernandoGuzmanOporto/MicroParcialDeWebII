<?php
session_start();

require_once __DIR__ . '/../../core/database/conexionsql.php';


if (isset($_POST['save_task'])) {
    $nombre = $_POST['Nombre'];
    $cantidad = $_POST['Cantidad'];
    $precio = $_POST['Precio'];
    $result = $conexion->query("SELECT MAX(id) AS max_id FROM producto");
    $row = $result->fetch_assoc();
    $new_id = ($row['max_id'] !== null) ? $row['max_id'] + 1 : 1;
    $sql = "INSERT INTO producto (id, nombre, cantidad, precio) VALUES (?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param('isdi', $new_id, $nombre, $cantidad, $precio);
    if ($stmt->execute()) {
        $_SESSION['message'] = 'Producto guardado';
        $_SESSION['message_type'] = 'success';
        header('Location: ../views/main.php');
        exit();
    } else {
        die("Query Failed.");
    }
}
?>
