<?php
    include("conectar.php");
    $conn = conexion();
   
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $can=$_POST['can'];
        $com=$_POST['com'];
        $con=$_POST['con'];
        $est=$_POST['est'];
        $mon=$_POST['mon'];
        $tip=$_POST['tip'];

        $sql = "INSERT INTO pago(cantidad,codCompra,codPago,confirmacionPago,estado,moneda,tipo) VALUE($can,$com,NULL,$con,'$est','$mon','$tip')";
       
        if(mysqli_query($conn,$sql))
        {
            echo "<script>
                    alert('El pago ha sido registrado con exito');
                    window.location='../HTML/FormPago.php';
                  </script>";
        }
        else
        {
            echo "<script>
                    alert('No se pudo realizar el registro del pago');
                    window.location='../HTML/FormPago.php';
                  </script>";
        }
    }
    else
    {
        echo "No se han enviado valores del formulario";
    }

    mysqli_close($conn);
?>