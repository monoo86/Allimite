<?php
include("../conectar.php");
    $conn=conexion();

    if($_SERVER['REQUEST_METHOD']=="GET")
    {
        $llave=$_GET['key'];

        $sql = "DELETE FROM mecanicos WHERE ci=$llave";

       
        if(mysqli_query($conn,$sql))
        {

            echo "<script>
                    alert('se elimino con exito');
                    window.location='../../HTML/FormMecanicos.php';
                   </script>";
        }
        else
        {
 
            echo "NO se pudo eliminar";
        }
    }
    else
    {
        echo "<script>
                alert('no se pudo eliminar');
                 window.location='../../HTML/FormMecanicos.php';
            </script>";
    }
    mysqli_close($conn);
?>