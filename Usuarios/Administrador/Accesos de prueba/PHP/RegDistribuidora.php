<?php

    include("conectar.php");
    $conn = conexion();

    if($_SERVER['REQUEST_METHOD']=="POST")
    {

        $nit=$_POST['nit'];
        $nom=$_POST['nom'];
        $dir=$_POST['dir'];
        $cor=$_POST['cor'];
        $tel=$_POST['tel'];

        $sql = "INSERT INTO distribuidora(nit,nombre,direccion,correo,telefono) VALUE($nit,'$nom','$dir','$cor',$tel)";

        if(mysqli_query($conn,$sql))
        {
            echo "<script>
                    alert('La distribuidora ha sido registrado con exito');
                    window.location='../HTML/FormDistribuidora.php';
                  </script>";
        }
        else
        {
            echo "<script>
                    alert('No se pudo realizar el registro de la distribuidora');
                    window.location='../HTML/FormDistribuidora.php';
                  </script>";
        }
    }
    else
    {
        echo "No se han enviado valores del formulario";
    }

    mysqli_close($conn);
?>