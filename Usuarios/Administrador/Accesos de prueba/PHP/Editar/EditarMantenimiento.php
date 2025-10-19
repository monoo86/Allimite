<?php
include("../conectar.php");
$conn = conexion();

// Recibir datos del formulario
$cod  = $_POST['cod'];   
$fec  = $_POST['fec'];   
$des  = $_POST['des'];   
$reg  = $_POST['reg'];  
$ent  = $_POST['ent'];   
$hor  = $_POST['hor'];   
$pre  = $_POST['pre'];   
$tip  = $_POST['tip'];   
$num  = $_POST['num'];   // Número de chasis del motor

// Sanitizar datos (opcional, recomendable)
$des = mysqli_real_escape_string($conn, $des);
$reg = mysqli_real_escape_string($conn, $reg);
$tip = mysqli_real_escape_string($conn, $tip);

// Consulta UPDATE
$sql = "UPDATE mantenimiento 
        SET fecha='$fec', descripcion='$des', registro='$reg', entrega='$ent', horario='$hor', precio=$pre, tipo='$tip', numChasis_motor=$num
        WHERE codMantenimiento=$cod";

// Ejecutar consulta
if (mysqli_query($conn, $sql)) {
    echo "<script>
            alert('Datos del mantenimiento modificados');
            window.location='/AllimiteCrude 2/HTML/FormMantenimiento.php';
          </script>";
} else {
    echo "<script>
            alert('No se pudo modificar: ".mysqli_error($conn)."');
            window.location='/AllimiteCrude 2/HTML/FormMantenimiento.php';
          </script>";
}

mysqli_close($conn);
?>
