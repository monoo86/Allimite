<?php
    //Realizar la conexion
    include("conectar.php");
    $conn=conexion();

    //Recibir las variables
    $mat=$_POST['mat'];
    $marca=$_POST['marca'];
    $tipo=$_POST['tipo'];
    $potencia=$_POST['potencia'];

    //Crear la sentencia de ingreso
    $sql="INSERT INTO camion(matricula,marca,tipo,potencia)VALUES('$mat','$marca','$tipo',$potencia)";

    //Ejecutar y verificar la sentencia
    if(mysqli_query($conn,$sql))
    {
        echo "<script>alert('CamiÃ³n Registrado');</script>";
    }
    else
    {
        echo "<script>alert('No se pudo resgistrar');</script>";
    }

    //Cerrar la conexion
     mysqli_close($conn);
?>

<?php
    //Realizar la conexion a la base de datos
    //Incluir el archivo conectar
    include("conectar.php");
    $conn = conexion();
   
    //Verificar que el formulario se haya enviado
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        //Recibimos los datos del formulario
        $cant=$_POST['cant'];
        $fecha=$_POST['fecha'];
        $dir=$_POST['dir'];
        $num=$_POST['num'];
        $desc=$_POST['desc'];
        $tol=$_POST['tol'];

        //Crear la sentencia sql
        $sql = "INSERT INTO pedido(codigoPedido,cantidadArticulo,fechaPedido,direccionEnvio,numeroCliente,descipcionPedido,total) VALUE(null,$cant,'$fecha','$dir',$num,'$desc',$tol)";
       
        //Ejecutamos la sentencia sql
        //mysqli_query(conexion,sentencia) --> Verdader o Falso
        if(mysqli_query($conn,$sql))
        {
            //La sentencia se ha ejecutado --> El camionero se ha registrado
            echo "<script>
                    alert('El pedido ha sido registrado con exito');
                    window.location='../HTML/formPedido.php';
                  </script>";
        }
        else
        {
            //La sentencia NO se ha ejecutado --> El camionero no se ha registrado
            echo "<script>
                    alert('No se pudo realizar el registro del pedido');
                    window.location='../HTML/formPedido.php';
                  </script>";
        }
    }
    else
    {
        echo "No se han enviado valores del formulario";
    }


    //cerramos la conexion
    mysqli_close($conn);
?>