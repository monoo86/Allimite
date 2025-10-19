<?php
include("../conectar.php");
$conn = conexion();

// Recibir datos del formulario
$ci  = $_POST['ci'];   
$nom = $_POST['nom'];   
$app = $_POST['app'];   
$apm = $_POST['apm'];   
$tel = $_POST['tel'];   
$cor = $_POST['cor'];   
$dir = $_POST['dir'];   
$dis = $_POST['dis'];   
$hor = $_POST['hor'];   

// Sanitizar datos (opcional, recomendable)
$nom = mysqli_real_escape_string($conn, $nom);
$app = mysqli_real_escape_string($conn, $app);
$apm = mysqli_real_escape_string($conn, $apm);
$cor = mysqli_real_escape_string($conn, $cor);
$dir = mysqli_real_escape_string($conn, $dir);
$dis = mysqli_real_escape_string($conn, $dis);

// Consulta UPDATE
$sql = "UPDATE mecanicos 
        SET nombre='$nom', apellidoPaterno='$app', apellidoMaterno='$apm', telefono=$tel, correo='$cor', direccion='$dir', discapacidad='$dis', horarioLaboral='$hor'
        WHERE ci=$ci";

// Ejecutar consulta
if (mysqli_query($conn, $sql)) {
    echo "<script>
            alert('Datos del mecánico modificados');
            window.location='/AllimiteCrude 2/HTML/FormMecanicos.php';
          </script>";
} else {
    echo "<script>
            alert('No se pudo modificar: ".mysqli_error($conn)."');
            window.location='/AllimiteCrude 2/HTML/FormMecanicos.php';
          </script>";
}

mysqli_close($conn);
?>
