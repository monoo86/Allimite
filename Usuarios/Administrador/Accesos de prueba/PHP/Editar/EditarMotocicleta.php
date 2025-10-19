<?php
include("../conectar.php");
$conn = conexion();


$num  = $_POST['num'];   
$mar  = $_POST['mar'];   
$cm2  = $_POST['cm2'];   
$mod  = $_POST['mod'];  
$col  = $_POST['col'];   
$pot  = $_POST['pot'];   
$dis  = isset($_POST['dis']) ? $_POST['dis'] : 0;  
$nit  = $_POST['nit'];   

// Sanitizar datos (opcional, recomendable)
$mar = mysqli_real_escape_string($conn, $mar);
$mod = mysqli_real_escape_string($conn, $mod);
$col = mysqli_real_escape_string($conn, $col);

// Consulta UPDATE
$sql = "UPDATE motocicleta 
        SET marca='$mar', Cm2=$cm2, modelo='$mod', color='$col', potencia=$pot, disponibilidad=$dis, nit=$nit
        WHERE numChasis_motor=$num";

// Ejecutar consulta
if (mysqli_query($conn, $sql)) {
    echo "<script>
            alert('Datos de la motocicleta modificados');
            window.location='/AllimiteCrude 2/HTML/FormMotocicleta.php';
          </script>";
} else {
    echo "<script>
            alert('No se pudo modificar: ".mysqli_error($conn)."');
            window.location='/AllimiteCrude 2/HTML/FormMotocicleta.php';
          </script>";
}

mysqli_close($conn);
?>
