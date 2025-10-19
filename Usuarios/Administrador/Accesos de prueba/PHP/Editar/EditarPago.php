<?php
include("../conectar.php");
$conn = conexion();

$codPago = $_POST['codPago'];   
$com     = $_POST['com'];   
$con     = isset($_POST['con']) ? 1 : 0;  // checkbox
$can     = $_POST['can'];   
$mon     = $_POST['mon'];   
$tip     = $_POST['tip'];   
$est     = $_POST['est'];   

// Sanitizar datos (opcional, recomendable)
$mon = mysqli_real_escape_string($conn, $mon);
$tip = mysqli_real_escape_string($conn, $tip);
$est = mysqli_real_escape_string($conn, $est);

// Consulta UPDATE
$sql = "UPDATE pago 
        SET codCompra=$com, confirmacionPago=$con, cantidad=$can, moneda='$mon', tipo='$tip', estado='$est'
        WHERE codPago=$codPago";

// Ejecutar consulta
if (mysqli_query($conn, $sql)) {
    echo "<script>
            alert('Datos del pago modificados');
            window.location='/AllimiteCrude 2/HTML/FormPago.php';
          </script>";
} else {
    echo "<script>
            alert('No se pudo modificar: ".mysqli_error($conn)."');
            window.location='/AllimiteCrude 2/HTML/FormPago.php';
          </script>";
}

mysqli_close($conn);
?>
