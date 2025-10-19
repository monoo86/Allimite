<?php

    include("conectar.php");
    $conn = conexion();

    if($_SERVER['REQUEST_METHOD']=="POST")
    {

        $ci=$_POST['ci'];
        $nom=$_POST['nom'];
        $app=$_POST['app'];
        $apm=$_POST['apm'];
        $tel=$_POST['tel'];
        $cor=$_POST['cor'];
        $dir=$_POST['dir'];
        $dis=$_POST['dis'];
        $hor=$_POST['hor'];


        $sql = "INSERT INTO mecanicos(ci,nombre,apellidoPaterno,apellidoMaterno,telefono,correo,direccion,discapacidad,horarioLaboral) VALUE($ci,'$nom','$app','$apm',$tel,'$cor','$dir','$dis','$hor')";

        if(mysqli_query($conn,$sql))
        {
            echo "<script>
                    alert('El mecanico ha sido registrado con exito');
                    window.location='../HTML/FormMecanicos.php';
                  </script>";
        }
        else
        {
            echo "<script>
                    alert('No se pudo realizar el registro del mecanico');
                    window.location='../HTML/FormMecanicos.php';
                  </script>";
        }
    }
    else
    {
        echo "No se han enviado valores del formulario";
    }

    mysqli_close($conn);
?>
