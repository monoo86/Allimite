<?php
include("../PHP/conectar.php");
$conn = conexion();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <script>
        function confirmaBorrar() {
            return confirm('¿Seguro de borrar?');
        }
    </script>
</head>
<body>
    <h2>Registrar Cliente</h2>
    <form action="../PHP/RegClientes.php" method="post">
        <label for="cic">Carnet de identidad del Cliente</label><br>
        <input type="number" name="cic" required><br><br>

        <label for="nom">Nombre del Cliente</label><br>
        <input type="text" name="nom" required><br><br>

        <label for="app">Apellido Paterno</label><br>
        <input type="text" name="app" required><br><br>

        <label for="apm">Apellido Materno</label><br>
        <input type="text" name="apm" required><br><br>

        <label for="eda">Edad del cliente</label><br>
        <input type="number" name="eda" required><br><br>

        <label for="cor">Correo Electronico</label><br>
        <input type="email" name="cor" required><br><br>

        <label for="tel">Telefono</label><br>
        <input type="number" name="tel" required><br><br>

        <?php
        // Lista de asesores comerciales
        $sql = "SELECT ci,nombre,apellidoPaterno,apellidoMaterno FROM asesorcomercial";
        $resultado = mysqli_query($conn,$sql);
        ?>
        <label for="ci">Asesor Comercial</label><br>
        <select name="ci" required>
            <?php
            while ($fila = mysqli_fetch_array($resultado)) {
                echo "<option value='{$fila['ci']}'>{$fila['nombre']} {$fila['apellidoPaterno']} {$fila['apellidoMaterno']}</option>";
            }
            ?>
        </select>
        <br><br>

        <button type="submit">Registrar</button>
        <button type="reset">Limpiar</button>
    </form>

    <hr>

    <h2>Lista de Clientes</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Carnet</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Edad</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Asesor Comercial</th>
            <th colspan="2">Acciones</th>
        </tr>
        <?php
        $sql = "SELECT c.*, a.nombre AS nom_asesor, a.apellidoPaterno AS app_asesor, a.apellidoMaterno AS apm_asesor 
                FROM clientes c 
                JOIN asesorcomercial a ON c.ci = a.ci";
        $tabla = mysqli_query($conn, $sql);
        while ($fila = mysqli_fetch_array($tabla)) {
        ?>
            <tr>
                <td><?php echo $fila['ciCliente']; ?></td>
                <td><?php echo $fila['nombre']; ?></td>
                <td><?php echo $fila['apellidoPaterno']; ?></td>
                <td><?php echo $fila['apellidoMaterno']; ?></td>
                <td><?php echo $fila['edad']; ?></td>
                <td><?php echo $fila['correo']; ?></td>
                <td><?php echo $fila['telefono']; ?></td>
                <td><?php echo $fila['nom_asesor']." ".$fila['app_asesor']." ".$fila['apm_asesor']; ?></td>
                <td><a href="FormClientes.php?cic=<?php echo $fila['ciCliente']; ?>">Editar</a></td>
                <td><a onclick="return confirmaBorrar();" href="../PHP/Eliminar/EliminarClientes.php?key=<?php echo $fila['ciCliente']; ?>">Eliminar</a></td>
            </tr>
        <?php
        }
        ?>
    </table>

    <hr>

    <?php
    // Bloque de edición
    if (isset($_GET['cic'])) {
        $cic = intval($_GET['cic']);
        $sql = "SELECT * FROM clientes WHERE ciCliente=$cic";
        $resultado = mysqli_query($conn,$sql);
        if ($fila = mysqli_fetch_array($resultado)) {
    ?>
        <h2>Editar Cliente</h2>
        <form action="../PHP/Editar/EditarClientes.php" method="post">
            <table align="center" border="0">
                <tr>
                    <td><label>Carnet de identidad</label></td>
                    <td><input type="number" name="cic" value="<?php echo $fila['ciCliente']; ?>" readonly></td>
                </tr>
                <tr>
                    <td><label>Nombre</label></td>
                    <td><input type="text" name="nom" value="<?php echo $fila['nombre']; ?>"></td>
                </tr>
                <tr>
                    <td><label>Apellido Paterno</label></td>
                    <td><input type="text" name="app" value="<?php echo $fila['apellidoPaterno']; ?>"></td>
                </tr>
                <tr>
                    <td><label>Apellido Materno</label></td>
                    <td><input type="text" name="apm" value="<?php echo $fila['apellidoMaterno']; ?>"></td>
                </tr>
                <tr>
                    <td><label>Edad</label></td>
                    <td><input type="number" name="eda" value="<?php echo $fila['edad']; ?>"></td>
                </tr>
                <tr>
                    <td><label>Correo</label></td>
                    <td><input type="email" name="cor" value="<?php echo $fila['correo']; ?>"></td>
                </tr>
                <tr>
                    <td><label>Teléfono</label></td>
                    <td><input type="number" name="tel" value="<?php echo $fila['telefono']; ?>"></td>
                </tr>
                <tr>
                    <?php
                    // Lista de asesores para edición
                    $sql2 = "SELECT ci,nombre,apellidoPaterno,apellidoMaterno FROM asesorcomercial";
                    $res2 = mysqli_query($conn,$sql2);
                    ?>
                    <td><label>Asesor Comercial</label></td>
                    <td>
                        <select name="ci">
                        <?php
                        while ($a = mysqli_fetch_array($res2)) {
                            $selected = ($a['ci'] == $fila['ci']) ? "selected" : "";
                            echo "<option value='{$a['ci']}' $selected>{$a['nombre']} {$a['apellidoPaterno']} {$a['apellidoMaterno']}</option>";
                        }
                        ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit">Modificar Cambios</button></td>
                </tr>
            </table>
        </form>
    <?php
        }
    }
    ?>

<?php mysqli_close($conn); ?>
</body>
</html>

