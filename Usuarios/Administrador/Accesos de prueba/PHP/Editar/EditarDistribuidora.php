<?php
    include("../conectar.php");
    $conn=conexion();

    $nit=$_POST['nit'];
    $nom=$_POST['nom'];
    $dir=$_POST['dir'];
    $cor=$_POST['cor'];
    $tel=$_POST['tel'];


    $sql="UPDATE distribuidora SET nombre='$nom', direccion='$dir',correo='$cor',telefono=$tel WHERE nit=$nit";

    if(mysqli_query($conn,$sql))
    {
        echo "<script>alert('Datos de la distribuidora modificados'); window.location='/AllimiteCrude 2/HTML/FormDistribuidora.php'; </script>";
    }
    else
    {
        echo "<script>alert('No se pudo modificar'); window.location='/AllimiteCrude 2/HTML/FormDistribuidora.php'; </script>";
    }

    mysqli_close($conn);

?>