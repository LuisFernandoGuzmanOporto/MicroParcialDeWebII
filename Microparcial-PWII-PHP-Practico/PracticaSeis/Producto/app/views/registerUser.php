<?php 

require_once __DIR__ . '/../../app/models/dbcxt.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['createUsername'];
    $password1 = $_POST['createPassword'];
    $password2 = $_POST['rewritePassword'];
    if ($password1 === $password2) {
        $hashedPassword = password_hash($password1, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuario (nombre, password) VALUES (?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param('ss', $nombre, $hashedPassword);
        if ($stmt->execute()) {
            echo "¡Cuenta creada exitosamente!";
            header("refresh:3; url=main.php");
        } else {
            echo "Error al crear la cuenta.";
        }
    } else {
        echo "Las contraseñas no coinciden.";
    }
}
?>
