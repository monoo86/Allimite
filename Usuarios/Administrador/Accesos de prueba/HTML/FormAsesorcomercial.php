<?php
include("../PHP/conectar.php");
$conn = conexion();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asesor Comercial</title>
    <script>
        function confirmaBorrar() {
            return confirm('¿Seguro de borrar?');
        }
    </script>
</head>
<body>
    <h2>Registro de Asesor Comercial</h2>
    <form action="../PHP/RegAsesorcomercial.php" method="post">
        <label for="ci">Carnet de identidad del Asesor Comercial</label>
        <input type="number" name="ci"><br><br>

        <label for="nom">Nombre del Asesor Comercial</label>
        <input type="text" name="nom"><br><br>

        <label for="app">Apellido Paterno</label>
        <input type="text" name="app"><br><br>

        <label for="apm">Apellido Materno</label>
        <input type="text" name="apm"><br><br>

        <label for="cor">Correo Electronico</label>
        <input type="email" name="cor"><br><br>

        <label for="dir">Direccion</label>
        <textarea name="dir" cols="30" rows="10"></textarea><br><br>

        <label for="hor">Horario laboral</label>
        <input type="time" name="hor"><br><br>

        <label for="ven">Numero de ventas</label>
        <input type="number" name="ven"><br><br>

        <label for="tel">Telefono</label>
        <input type="number" name="tel"><br><br>

        <button type="submit">Registrar</button>
        <button type="reset">Limpiar</button>
    </form>

    <hr>

    <h2>Asesor Comercial</h2>
    <table border="1">
        <tr>
            <th>CI</th>
            <th>Nombre</th>
            <th>Apellidos Paterno</th>
            <th>Apellidos Materno</th>
            <th>Número de ventas</th>
            <th>Dirección</th>
            <th>Horario laboral</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th colspan="2">Acciones</th>
        </tr>
        <?php
        $sql = "SELECT * FROM asesorcomercial";
        $tabla = mysqli_query($conn, $sql);
        while ($fila = mysqli_fetch_array($tabla)) { ?>
            <tr>
                <td><?php echo $fila['ci']; ?></td>
                <td><?php echo $fila['nombre']; ?></td>
                <td><?php echo $fila['apellidoPaterno']; ?></td>
                <td><?php echo $fila['apellidoMaterno']; ?></td>
                <td><?php echo $fila['numVentas']; ?></td>
                <td><?php echo $fila['direccion']; ?></td>
                <td><?php echo $fila['horarioLaboral']; ?></td>
                <td><?php echo $fila['telefono']; ?></td>
                <td><?php echo $fila['correo']; ?></td>
                <td><a href="FormAsesorComercial.php?ci=<?php echo $fila['ci']; ?>">Editar</a></td>
                <td><a onclick="return confirmaBorrar();" href="../PHP/Eliminar/EliminarAsesor.php?key=<?php echo $fila['ci']; ?>">Eliminar</a></td>
            </tr>
        <?php } ?>
    </table>

    <hr>

    <?php
    // Bloque de edición si se pasa ?ci= en la URL
    if (isset($_GET['ci'])) {
        $ci = intval($_GET['ci']);
        $sql = "SELECT * FROM asesorcomercial WHERE ci=$ci";
        $resultado = mysqli_query($conn, $sql);
        if ($fila = mysqli_fetch_array($resultado)) {
    ?>
    <h2>Editar Asesor Comercial</h2>
    <form action="../PHP/Editar/EditarAsesorcomercial.php" method="post">
        <table align="center" border="0">
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
                <td><label for="cor">Correo Electronico</label></td>
                <td><input type="email" name="cor" value="<?php echo $fila['correo']; ?>"></td>
            </tr>
            <tr>
                <td><label for="dir">Direccion</label></td>
                <td><textarea name="dir" cols="30" rows="5"><?php echo $fila['direccion']; ?></textarea></td>
            </tr>
            <tr>
                <td><label for="hor">Horario laboral</label></td>
                <td><input type="time" name="hor" value="<?php echo $fila['horarioLaboral']; ?>"></td>
            </tr>
            <tr>
                <td><label for="ven">Numero de ventas</label></td>
                <td><input type="number" name="ven" value="<?php echo $fila['numVentas']; ?>"></td>
            </tr>
            <tr>
                <td><label for="tel">Telefono</label></td>
                <td><input type="number" name="tel" value="<?php echo $fila['telefono']; ?>"></td>
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
