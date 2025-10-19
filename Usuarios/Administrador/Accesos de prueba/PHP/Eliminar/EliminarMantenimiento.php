<?php
include("../conectar.php");
    $conn=conexion();

    if($_SERVER['REQUEST_METHOD']=="GET")
    {
        $llave=$_GET['key'];

        $sql = "DELETE FROM mantenimiento WHERE codMantenimiento=$llave";

       
        if(mysqli_query($conn,$sql))
        {

            echo "<script>
                    alert('se elimino con exito');
                    window.location='../../HTML/FormMantenimiento.php';
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
                alert('no se pudo eliminar);
                 window.location='../../HTML/FormMantenimiento.php';
            </script>";
    }
    mysqli_close($conn);
?>