<?php
include("conectar.php");
    $conn=conexion();
       
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $nom=$_POST['nom'];

        $sql = "SELECT * FROM usuario WHERE nombre='$nom'";
        $tabla=mysqli_query($conn,$sql);
        if($fila=mysqli_fetch_array($tabla))
        {
            echo "<script>
            alert('usuario ya existente');
            window.location='../html/FormUsuario.php';
           </script>";
         
        }
        else
        {  
            $con=$_POST['con'];
            $tip=$_POST['tip'];

            $sql = "INSERT INTO usuario (idUsuario, nombre, contraseña, tipo) VALUES ( NULL,'$nom','$con','$tip')";
               
                      
            if(mysqli_query($conn,$sql))
            {
               
                echo "<script>
                        alert('se registro');
                        window.location='../html/FormUsuario.php';
                        </script>";
            }
            else
            {
                
                echo "NO se pudo registrar";
            }
               
        }
               
    }
    else
    {
        echo "<script>
            alert('no se registro');
            window.location='../html/Login-Dashboard/FormUsuario.php';
            </script>";
    }
    mysqli_close($conn);
?>