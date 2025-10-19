<?php
    include("conectar.php");
    $conn = conexion();
   
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $can=$_POST['can'];
        $cic=$_POST['cic'];
        $fec=$_POST['fec'];
        $cha=$_POST['cha'];
        $hor=$_POST['hor'];
        $pro=$_POST['pro'];

        $sql = "INSERT INTO compra(cantidad,ciCliente,codCompra,fecha,hora,numChasis_motor,productos) VALUE($can,$cic,NULL,'$fec','$hor',$cha,'$pro')";
       
        if(mysqli_query($conn,$sql))
        {
            echo "<script>
                    alert('La compra ha sido registrado con exito');
                    window.location='../HTML/FormCompra.php';
                  </script>";
        }
        else
        {
            echo "<script>
                    alert('No se pudo realizar el registro de la compra);
                    window.location='../HTML/FormCompra.php';
                  </script>";
        }
    }
    else
    {
        echo "No se han enviado valores del formulario";
    }

    mysqli_close($conn);
?>