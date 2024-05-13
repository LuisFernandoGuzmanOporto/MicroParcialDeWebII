<?php
require_once __DIR__ . '/../../app/models/dbcxt.php';
if(isset($_POST['nombreUser']) && isset($_POST['contrasenia'])) {
    $nombreUser = $_POST['nombreUser'];
    $password = $_POST['contrasenia'];
    $consulta = "SELECT * FROM usuario WHERE nombre = ?";
    $stmt = $conexion->prepare($consulta);
    $stmt->bind_param('s', $nombreUser);
    $stmt->execute();
    $resultado = $stmt->get_result();
    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $hash_guardado = $fila['password'];
        if (password_verify($password, $hash_guardado)) {
            header("Location: main.php");
            exit();
        } else {
            header("Location: signIn.php?error=Contraseña incorrecta");
            exit();
        }
    } else {
        header("Location: signIn.php?error=Nombre de usuario incorrecto");
        exit();
    }
    $stmt->close();
    $conexion->close();
} else {
    echo "Error: Los datos del formulario no fueron recibidos correctamente.";
}
?>
