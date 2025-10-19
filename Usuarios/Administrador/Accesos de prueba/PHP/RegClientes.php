<?php
    include("conectar.php");
    $conn = conexion();
   
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $app=$_POST['app'];
        $apm=$_POST['apm'];
        $ci=$_POST['ci'];
        $cic=$_POST['cic'];
        $cor=$_POST['cor'];
        $eda=$_POST['eda'];
        $nom=$_POST['nom'];
        $tel=$_POST['tel'];

        $sql = "INSERT INTO clientes(apellidoMaterno, apellidoPaterno, ci, ciCliente, correo, edad, nombre, telefono) VALUE('$apm','$app',$ci,$cic,'$cor',$eda,'$nom',$tel)";
       
        if(mysqli_query($conn,$sql))
        {
            echo "<script>
                    alert('El cliente ha sido registrado con exito');
                    window.location='../HTML/FormClientes.php';
                  </script>";
        }
        else
        {
            echo "<script>
                    alert('No se pudo realizar el registro del cliente');
                    window.location='../HTML/FormClientes.php';
                  </script>";
        }
    }
    else
    {
        echo "No se han enviado valores del formulario";
    }

    mysqli_close($conn);
?>