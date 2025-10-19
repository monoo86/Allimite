<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Acceso al Sistema</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <label for="nom">Nombre De Usuario</label>
        <input type="text" name="nom" required><br><br>
        <br><br>
        <label for="con">Contraseña</label>
        <input type="password" name="con"><br><br>
        <br><br>
        <button type="submit">Ingresar</button> 
    </form>
    <h2>Mantenimiento de Mecánicos</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Nombre De Usuario</th>
            <th>Contraseña</th>
            <th>Código</th>
            <th colspan="2">Acciones</th>
        </tr>
        <?php
            include("../../php/conectar.php");
            $conn=conexion();
            $sql="SELECT * FROM usuario";
            $tabla=mysqli_query($conn,$sql);
            while($fila=mysqli_fetch_array($tabla)) {
        ?>
        <tr>
            <td><?php echo $fila['nombre']; ?></td>
            <td><?php echo $fila['contraseña']; ?></td>
            <td><?php echo $fila['idUsuario']; ?></td>
            <td><a href="#">Editar</a></td>
            <td><a href="#">Eliminar</a></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $nom=$_POST['nom'];
    $con=$_POST['con'];

    $sql="SELECT * FROM usuario WHERE nombre='$nom' and contraseña='$con'";
    $tabla=mysqli_query($conn,$sql);
    if($fila=mysqli_fetch_array($tabla))
    {
       switch($fila['tipo'])
       {
            case'Usuario':
                session_start();
                $_SESSION['nombre']=$fila['nombre'];
                $_SESSION['tipo']=$fila['tipo'];
                echo "<script>alert('Acesso concedido');
                window.location='DashboardUser.php';
                </script>";
            break;
            case 'Admin': 
                session_start();
                $_SESSION['nombre']=$fila['nombre'];
                $_SESSION['tipo']=$fila['tipo'];
                echo "<script>alert('Acesso concedido');
                window.location='DashboardAdmin.php';</script>";
            break;
            case 'AsesorComercial': 
                session_start();
                $_SESSION['nombre']=$fila['nombre'];
                $_SESSION['tipo']=$fila['tipo'];
                echo "<script>alert('Acesso concedido');
                window.location='DashboardAsesor.php';</script>";
            break;
            case 'Mecanico': 
                session_start();
                $_SESSION['nombre']=$fila['nombre'];
                $_SESSION['tipo']=$fila['tipo'];
                echo "<script>alert('Acesso concedido');
                window.location='DashboardMecanico.php';</script>";
            break;
       }
    }
    else
    {
       echo "<script>alert('Usuario o contraseña incorrecto, Acceso denegado');window.location='login.php';</script>";
    }
}
?>