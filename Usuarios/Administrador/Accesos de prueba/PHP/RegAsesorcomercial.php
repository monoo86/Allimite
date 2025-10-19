<?php
    include("conectar.php");
    $conn = conexion();
   
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $app=$_POST['app'];
        $apm=$_POST['apm'];
        $ci=$_POST['ci'];
        $cor=$_POST['cor'];
        $dir=$_POST['dir'];
        $hor=$_POST['hor'];
        $nom=$_POST['nom'];
        $ven=$_POST['ven'];
        $tel=$_POST['tel'];

        $sql = "INSERT INTO asesorcomercial(apellidoMaterno, apellidoPaterno, ci, correo, direccion, horarioLaboral, nombre, numVentas, telefono) VALUE('$apm','$app',$ci,'$cor','$dir','$hor','$nom',$ven,$tel)";
       
        if(mysqli_query($conn,$sql))
        {
            echo "<script>
                    alert('El asesor comercial ha sido registrado con exito');
                    window.location='../HTML/FormAsesorcomercial.php';
                  </script>";
        }
        else
        {
            echo "<script>
                    alert('No se pudo realizar el registro del asesor comercial');
                    window.location='../HTML/FormAsesorcomercial.php';
                  </script>";
        }
    }
    else
    {
        echo "No se han enviado valores del formulario";
    }

    mysqli_close($conn);
?>