<?php

    include("conectar.php");
    $conn = conexion();

    if($_SERVER['REQUEST_METHOD']=="POST")
    {

        $ci=$_POST['ci'];
        $codMantenimiento=$_POST['codMantenimiento'];

        $sql = "INSERT INTO mantenimiento_mecanicos(id,ci,codMantenimiento) VALUE(NULL, $ci, $codMantenimiento )";

        if(mysqli_query($conn,$sql))
        {
            echo "<script>
                    alert('El mantenimiento del mecanico ha sido registrado con exito');
                    window.location='../HTML/FormMan_Mec.php';
                  </script>";
        }
        else
        {
            echo "<script>
                    alert('No se pudo realizar el registro del mantenimiento del mecanico');
                    window.location='../HTML/FormMan_Mec.php';
                  </script>";
        }
    }
    else
    {
        echo "No se han enviado valores del formulario";
    }

    mysqli_close($conn);
?>