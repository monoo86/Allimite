<?php
include("conectar.php");
$conn = conexion();

if($_SERVER['REQUEST_METHOD']=="POST")
{
    $fec = $_POST['fec'];
    $des = $_POST['des'];
    $reg = $_POST['reg'];
    $ent = $_POST['ent'];
    $hor = $_POST['hor'];
    $pre = $_POST['pre'];
    $tip = $_POST['tip'];
    $num = $_POST['num'];

    $sql = "INSERT INTO mantenimiento
            (codMantenimiento, fecha, descripcion, registro, entrega, horario, precio, tipo, numChasis_motor) 
            VALUES (NULL, '$fec', '$des', '$reg', '$ent', '$hor', '$pre', '$tip', '$num')";

    if(mysqli_query($conn,$sql))
    {
        echo "<script>
                alert('El mantenimiento ha sido registrado con éxito');
                window.location='../HTML/FormMantenimiento.php';
              </script>";
    } else {
        echo "<script>
                alert('No se pudo realizar el registro del mantenimiento: ".mysqli_error($conn)."');
                window.location='../HTML/FormMantenimiento.php';
              </script>";
    }
}
else
{
    echo "No se han enviado valores del formulario";
}

mysqli_close($conn);
?>