<?php
include("../PHP/conectar.php");
$conn = conexion();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Mecanico</title>
    <script>
        function confirmaBorrar() {
            return confirm('¿Seguro de borrar?');
        }
    </script>
</head>
<body>
    <h2>Registro de Mecanico</h2>
    <form action="../PHP/RegMecanicos.php" method="post">
        <label for="ci">CI</label><br>
        <input type="number" name="ci"><br><br>

        <label for="nom">Nombre</label><br>
        <input type="text" name="nom"><br><br>

        <label for="app">Apellido Paterno</label><br>
        <input type="text" name="app"><br><br>

        <label for="apm">Apellido Materno</label><br>
        <input type="text" name="apm"><br><br>

        <label for="tel">Telefono</label><br>
        <input type="number" name="tel"><br><br>

        <label for="cor">Correo Electronico</label><br>
        <input type="email" name="cor"><br><br>

        <label for="dir">Direccion</label><br>
        <textarea name="dir" cols="30" rows="5"></textarea><br><br>

        <label for="dis">Discapacidad</label><br>
        <input type="text" name="dis"><br><br>

        <label for="hor">Horario Laboral</label><br>
        <input type="time" name="hor"><br><br>

        <button type="submit">Registrar</button>
        <button type="reset">Limpiar</button>
    </form>

    <hr>

    <h2>Lista de Mecánicos</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>CI</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Direccion</th>
            <th>Discapacidad</th>
            <th>Horario Laboral</th>
            <th colspan="2">Acciones</th>
        </tr>
        <?php
        $sql = "SELECT * FROM mecanicos";
        $tabla = mysqli_query($conn, $sql);
        while ($fila = mysqli_fetch_array($tabla)) {
        ?>
            <tr>
                <td><?php echo $fila['ci']; ?></td>
                <td><?php echo $fila['nombre']; ?></td>
                <td><?php echo $fila['apellidoPaterno']; ?></td>
                <td><?php echo $fila['apellidoMaterno']; ?></td>
                <td><?php echo $fila['telefono']; ?></td>
                <td><?php echo $fila['correo']; ?></td>
                <td><?php echo $fila['direccion']; ?></td>
                <td><?php echo $fila['discapacidad']; ?></td>
                <td><?php echo $fila['horarioLaboral']; ?></td>
                <td><a href="FormMecanicos.php?ci=<?php echo $fila['ci']; ?>">Editar</a></td>
                <td><a onclick="return confirmaBorrar();" href="../PHP/Eliminar/EliminarMecanicos.php?key=<?php echo $fila['ci']; ?>">Eliminar</a></td>
            </tr>
        <?php
        }
        ?>
    </table>

    <hr>

    <?php
    // Bloque de edición si se pasa ?ci= en la URL
    if (isset($_GET['ci'])) {
        $ci = intval($_GET['ci']);
        $sql = "SELECT * FROM mecanicos WHERE ci=$ci";
        $resultado = mysqli_query($conn, $sql);

        if ($fila = mysqli_fetch_array($resultado)) {
    ?>
        <h2>Editar Mecánico</h2>
        <form action="../PHP/Editar/EditarMecanicos.php" method="post">
            <table border="0" align="center">
                <tr>
                    <td><label for="ci">CI</label></td>
                    <td><input type="number" name="ci" value="<?php echo $fila['ci']; ?>" readonly></td>
                </tr>
                <tr>
                    <td><label for="nom">Nombre</label></td>
                    <td><input type="text" name="nom" value="<?php echo $fila['nombre']; ?>"></td>
                </tr>
                <tr>
                    <td><label for="app">Apellido Paterno</label></td>
                    <td><input type="text" name="app" value="<?php echo $fila['apellidoPaterno']; ?>"></td>
                </tr>
                <tr>
                    <td><label for="apm">Apellido Materno</label></td>
                    <td><input type="text" name="apm" value="<?php echo $fila['apellidoMaterno']; ?>"></td>
                </tr>
                <tr>
                    <td><label for="tel">Telefono</label></td>
                    <td><input type="number" name="tel" value="<?php echo $fila['telefono']; ?>"></td>
                </tr>
                <tr>
                    <td><label for="cor">Correo</label></td>
                    <td><input type="email" name="cor" value="<?php echo $fila['correo']; ?>"></td>
                </tr>
                <tr>
                    <td><label for="dir">Direccion</label></td>
                    <td><textarea name="dir" cols="30" rows="5"><?php echo $fila['direccion']; ?></textarea></td>
                </tr>
                <tr>
                    <td><label for="dis">Discapacidad</label></td>
                    <td><input type="text" name="dis" value="<?php echo $fila['discapacidad']; ?>"></td>
                </tr>
                <tr>
                    <td><label for="hor">Horario Laboral</label></td>
                    <td><input type="time" name="hor" value="<?php echo $fila['horarioLaboral']; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit">Modificar Cambios</button></td>
                </tr>
            </table>
        </form>
    <?php
        }
    }
    mysqli_close($conn);
    ?>
</body>
</html>
