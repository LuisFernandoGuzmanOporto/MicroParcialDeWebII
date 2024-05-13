<?php
require_once __DIR__ . '../../../config/config.php';
?>

<script>
    alert("Conexión exitosa a la base de datos");
    setTimeout(function(){
        window.close();
    }, 5000);
</script>

<?php
class ConexionModel {
    public function conectar_a_bd() {
        global $host, $db_usuario, $db_contrasena, $db_nombre;
        
        $conexion = new mysqli($host, $db_usuario, $db_contrasena, $db_nombre);
        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }
        return $conexion;
    }
}

$conexionModel = new ConexionModel();
$conexion = $conexionModel->conectar_a_bd();
?>
