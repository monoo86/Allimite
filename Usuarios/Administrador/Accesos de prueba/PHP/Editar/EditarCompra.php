<?php
include("../conectar.php");
$conn = conexion();


$cod  = $_POST['cod'];  
$cha  = $_POST['cha'];  
$cic  = $_POST['cic'];  
$can  = $_POST['can'];   
$fec  = $_POST['fec'];   
$hor  = $_POST['hor'];   
$pro  = $_POST['pro'];   

// Sanitizar cadenas de texto
$pro = mysqli_real_escape_string($conn, $pro);

// Consulta UPDATE
$sql = "UPDATE Compra 
        SET numChasis_motor=$cha, ciCliente=$cic, cantidad=$can, fecha='$fec', hora='$hor', productos='$pro'
        WHERE codCompra=$cod";

// Ejecutar consulta
if (mysqli_query($conn, $sql)) {
    echo "<script>
            alert('Datos de la compra modificados');
            window.location='/AllimiteCrude 2/HTML/FormCompra.php';
          </script>";
} else {
    echo "<script>
            alert('No se pudo modificar: ".mysqli_error($conn)."');
            window.location='/AllimiteCrude 2/HTML/FormCompra.php';
          </script>";
}

mysqli_close($conn);
?>
