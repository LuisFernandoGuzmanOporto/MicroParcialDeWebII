<?php

require_once __DIR__ . '/../../app/models/dbcxt.php';

if (isset($_POST['save_task'])) {
    $nombre = $_POST['Nombre'];
    $cantidad = $_POST['Cantidad'];
    $precio = $_POST['Precio'];
    $sql = "INSERT INTO producto (nombre, cantidad, precio) VALUES (?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param('sdi', $nombre, $cantidad, $precio);
    if ($stmt->execute()) {
        $_SESSION['message'] = 'Producto guardado';
        $_SESSION['message_type'] = 'success';
        header('Location: main.php');
        exit();
    } else {
        die("Query Failed.");
    }
}
?>
