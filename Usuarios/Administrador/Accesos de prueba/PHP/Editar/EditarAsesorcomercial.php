<?php
include("../conectar.php");
$conn = conexion();


$ci = $_POST['ci'];        
$nom = $_POST['nom'];         
$app = $_POST['app'];      
$apm = $_POST['apm'];       
$cor = $_POST['cor'];         
$dir = $_POST['dir'];        
$hor = $_POST['hor'];         
$ven = $_POST['ven'];       
$tel = $_POST['tel'];       

// Sanitizar datos (recomendable)
$nom = mysqli_real_escape_string($conn, $nom);
$app = mysqli_real_escape_string($conn, $app);
$apm = mysqli_real_escape_string($conn, $apm);
$cor = mysqli_real_escape_string($conn, $cor);
$dir = mysqli_real_escape_string($conn, $dir);

// Consulta UPDATE
$sql = "UPDATE asesorcomercial 
        SET nombre='$nom',
            apellidoPaterno='$app',
            apellidoMaterno='$apm',
            correo='$cor',
            direccion='$dir',
            horarioLaboral='$hor',
            numVentas=$ven,
            telefono=$tel
        WHERE ci=$ci";

// Ejecutar consulta
if (mysqli_query($conn, $sql)) {
    echo "<script>
            alert('Datos del asesor comercial modificados');
            window.location='/AllimiteCrude 2/HTML/FormAsesorcomercial.php';
          </script>";
} else {
    echo "<script>
            alert('No se pudo modificar: ".mysqli_error($conn)."');
            window.location='/AllimiteCrude 2/HTML/FormAsesorcomercial.php';
          </script>";
}

mysqli_close($conn);
?>
