<?php

    include("conectar.php");
    $conn = conexion();

    if($_SERVER['REQUEST_METHOD']=="POST")
    {

        $num=$_POST['num'];
        $mar=$_POST['mar'];
        $cm2=$_POST['cm2'];
        $mod=$_POST['mod'];
        $col=$_POST['col'];
        $pot=$_POST['pot'];
        $dis=$_POST['dis'];
        $nit=$_POST['nit'];

        $sql = "INSERT INTO motocicleta(numChasis_motor,marca,Cm2,modelo,color,potencia,disponibilidad,nit) VALUE($num,'$mar',$cm2,'$mod','$col', $pot, $dis, $nit)";

        if(mysqli_query($conn,$sql))
        {
            echo "<script>
                    alert('La motocicleta ha sido registrado con exito');
                    window.location='../HTML/FormMotocicleta.php';
                  </script>";
        }
        else
        {
            echo "<script>
                    alert('No se pudo realizar el registro de la motocicleta');
                    window.location='../HTML/FormMotocicleta.php';
                  </script>";
        }
    }
    else
    {
        echo "No se han enviado valores del formulario";
    }

    mysqli_close($conn);
?>