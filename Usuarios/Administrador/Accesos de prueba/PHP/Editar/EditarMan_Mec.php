<?php
include("../conectar.php");
$conn = conexion();

// Recibir datos del formulario
$id = $_POST['id'];           
$ci = $_POST['ci'];         
$codMantenimiento = $_POST['codMantenimiento']; 

// Sanitizar datos (recomendable)
$ci = mysqli_real_escape_string($conn, $ci);
$codMantenimiento = mysqli_real_escape_string($conn, $codMantenimiento);

// Consulta UPDATE
$sql = "UPDATE mantenimiento_mecanicos 
        SET ci='$ci', codMantenimiento='$codMantenimiento'
        WHERE id=$id";

// Ejecutar consulta
if (mysqli_query($conn, $sql)) {
    echo "<script>
            alert('Datos del mantenimiento del mecánico modificados');
            window.location='/AllimiteCrude 2/HTML/FormMan_Mec.php';
          </script>";
} else {
    echo "<script>
            alert('No se pudo modificar: ".mysqli_error($conn)."');
            window.location='/AllimiteCrude 2/HTML/FormMan_Mec.php';
          </script>";
}

mysqli_close($conn);
?>
