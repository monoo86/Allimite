<?php
    include("../PHP/conectar.php");
    $conn = conexion();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Distribuidora</title>
    <script>
        function confirmaBorrar() {
            return confirm('¿Seguro de borrar?');
        }
    </script>
</head>
<body>
    <h2>Registro de Distribuidora</h2>
    <form action="../PHP/RegDistribuidora.php" method="post">
        <label for="nit">Nit</label><br>
        <input type="number" name="nit"><br><br>

        <label for="nom">Nombre</label><br>
        <input type="text" name="nom"><br><br>

        <label for="dir">Direccion</label><br>
        <textarea name="dir" cols="30" rows="5"></textarea><br><br>

        <label for="cor">Correo Electronico</label><br>
        <input type="email" name="cor"><br><br>

        <label for="tel">Telefono</label><br>
        <input type="number" name="tel"><br><br>

        <button type="submit">Registrar</button>
        <button type="reset">Limpiar</button>
    </form>

    <hr>

    <h2>Lista de Distribuidoras</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Nit</th>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th colspan="2">Acciones</th>
        </tr>
        <?php
        //Crear la consulta
        $sql = "SELECT * FROM distribuidora";
        //ejecutamos la consulta
        $tabla = mysqli_query($conn, $sql);
        while ($fila = mysqli_fetch_array($tabla)) {
        ?>
            <tr>
                <td><?php echo $fila['nit']; ?></td>
                <td><?php echo $fila['nombre']; ?></td>
                <td><?php echo $fila['direccion']; ?></td>
                <td><?php echo $fila['correo']; ?></td>
                <td><?php echo $fila['telefono']; ?></td>
                <td><a href="FormDistribuidora.php?nit=<?php echo $fila['nit']; ?>">Editar</a></td>
                <td><a onclick="return confirmaBorrar();" href="../PHP/Eliminar/EliminarDistribuidora.php?key=<?php echo $fila['nit']; ?>">Eliminar</a></td>           
            </tr>
        <?php
        }
        ?>
    </table>

        <hr>

    <?php
    // Bloque de edición solo si se pasa ?nit= en la URL
    if (isset($_GET['nit'])) {
        $nit = intval($_GET['nit']); 
        $sql = "SELECT * FROM distribuidora WHERE nit=$nit";
        $resultado = mysqli_query($conn, $sql);

        if ($fila = mysqli_fetch_array($resultado)) {
    ?>
        <h2>Editar Distribuidora</h2>
        <form action="../PHP/Editar/EditarDistribuidora.php" method="post">
            <table align="center" border="0">
                <tr>
                    <td><label for="nit">NIT</label></td>
                    <td><input type="number" name="nit" value="<?php echo $fila['nit']; ?>" readonly></td>
                </tr>
                <tr>
                    <td><label for="nom">Nombre</label></td>
                    <td><input type="text" name="nom" value="<?php echo $fila['nombre']; ?>"></td>
                </tr>
                <tr>
                    <td><label for="dir">Direccion</label></td>
                    <td><textarea name="dir" cols="30" rows="5"><?php echo $fila['direccion']; ?></textarea></td>
                </tr>
                <tr>
                    <td><label for="cor">Correo Electronico</label></td>
                    <td><input type="email" name="cor" value="<?php echo $fila['correo']; ?>"></td>
                </tr>
                <tr>
                    <td><label for="tel">Teléfono</label></td>
                    <td><input type="number" name="tel" value="<?php echo $fila['telefono']; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit">Modificar Cambios</button></td>
                </tr>
            </table>
        </form>
    <?php
        } // cierre if($fila)
    } // cierre if(isset($_GET['nit']))
    ?>

    <?php mysqli_close($conn); ?>
</body>
</html>
