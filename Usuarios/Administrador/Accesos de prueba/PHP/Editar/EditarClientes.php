<?php
include("../conectar.php");
$conn = conexion();

$ciCliente = $_POST['cic'];   
$nom       = $_POST['nom'];   
$app       = $_POST['app'];   
$apm       = $_POST['apm'];   
$eda       = $_POST['eda'];   
$cor       = $_POST['cor'];   
$tel       = $_POST['tel'];   
$ciAsesor  = $_POST['ci'];    

// Sanitizar datos (recomendable)
$nom  = mysqli_real_escape_string($conn, $nom);
$app  = mysqli_real_escape_string($conn, $app);
$apm  = mysqli_real_escape_string($conn, $apm);
$cor  = mysqli_real_escape_string($conn, $cor);

// Consulta UPDATE
$sql = "UPDATE clientes 
        SET nombre='$nom',
            apellidoPaterno='$app',
            apellidoMaterno='$apm',
            correo='$cor',
            telefono=$tel,
            edad=$eda,
            ci=$ciAsesor
        WHERE ciCliente=$ciCliente";

// Ejecutar consulta
if (mysqli_query($conn, $sql)) {
    echo "<script>
            alert('Datos del cliente modificados');
            window.location='/AllimiteCrude 2/HTML/FormClientes.php';
          </script>";
} else {
    echo "<script>
            alert('No se pudo modificar: ".mysqli_error($conn)."');
            window.location='/AllimiteCrude 2/HTML/FormClientes.php';
          </script>";
}

mysqli_close($conn);
?>
