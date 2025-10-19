<?php
include("../PHP/conectar.php");
$conn = conexion();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Compras</title>
    <script>
        function confirmaBorrar() {
            return confirm('¿Seguro de borrar?');
        }
    </script>
</head>
<body>
    <h2>Registrar Compra</h2>
    <form action="../PHP/RegCompra.php" method="post">

        <?php
        $sql = "SELECT numChasis_motor, marca, modelo, color, disponibilidad FROM motocicleta";
        $resultado = mysqli_query($conn, $sql);
        ?>
        <label for="cha">Número de Chasis Motor</label><br>
        <select name="cha" required>
            <?php
            while ($fila = mysqli_fetch_array($resultado)) {
                echo "<option value='{$fila['numChasis_motor']}'>{$fila['marca']} {$fila['modelo']} {$fila['color']} {$fila['disponibilidad']}</option>";
            }
            ?>
        </select>
        <br><br>

        <?php
        $sql1 = "SELECT ciCliente, nombre, apellidoPaterno, apellidoMaterno FROM clientes";
        $resultado1 = mysqli_query($conn, $sql1);
        ?>
        <label for="cic">Cliente</label><br>
        <select name="cic" required>
            <?php
            while ($fila1 = mysqli_fetch_array($resultado1)) {
                echo "<option value='{$fila1['ciCliente']}'>{$fila1['nombre']} {$fila1['apellidoPaterno']} {$fila1['apellidoMaterno']}</option>";
            }
            ?>
        </select>
        <br><br>

        <label for="can">Cantidad</label>
        <input type="number" name="can" required>
        <br><br>

        <label for="fec">Fecha de Compra</label>
        <input type="date" name="fec" required>
        <br><br>

        <label for="hor">Hora de Compra</label>
        <input type="time" name="hor" required>
        <br><br>

        <label for="pro">Productos</label>
        <input type="text" name="pro" required>
        <br><br>

        <button type="submit">Registrar</button>
        <button type="reset">Limpiar</button>
    </form>

    <hr>

    <h2>Lista de Compras</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Código Compra</th>
            <th>Hora</th>
            <th>Fecha</th>
            <th>Cantidad</th>
            <th>Productos</th>
            <th>CI Cliente</th>
            <th>Número Chasis Motor</th>
            <th colspan="2">Acciones</th>
        </tr>
        <?php
        $sql = "SELECT * FROM Compra";
        $tabla = mysqli_query($conn, $sql);
        while ($fila = mysqli_fetch_array($tabla)) {
        ?>
            <tr>
                <td><?php echo $fila['codCompra']; ?></td>
                <td><?php echo $fila['hora']; ?></td>
                <td><?php echo $fila['fecha']; ?></td>
                <td><?php echo $fila['cantidad']; ?></td>
                <td><?php echo $fila['productos']; ?></td>
                <td><?php echo $fila['ciCliente']; ?></td>
                <td><?php echo $fila['numChasis_motor']; ?></td>
                <td><a href="FormCompra.php?cod=<?php echo $fila['codCompra']; ?>">Editar</a></td>
                <td><a onclick="return confirmaBorrar();" href="../PHP/Eliminar/EliminarCompra.php?key=<?php echo $fila['codCompra']; ?>">Eliminar</a></td>
            </tr>
        <?php
        }
        ?>
    </table>

    <hr>

    <?php
    // Bloque de edición
    if (isset($_GET['cod'])) {
        $cod = intval($_GET['cod']);
        $sql = "SELECT * FROM Compra WHERE codCompra=$cod";
        $resultado = mysqli_query($conn, $sql);
        if ($fila = mysqli_fetch_array($resultado)) {
    ?>
        <h2>Editar Compra</h2>
        <form action="../PHP/Editar/EditarCompra.php" method="post">
            <table align="center" border="0">
                <tr>
                    <td><label>Código Compra</label></td>
                    <td><input type="number" name="cod" value="<?php echo $fila['codCompra']; ?>" readonly></td>
                </tr>
                <tr>
                    <td><label>Número Chasis Motor</label></td>
                    <td>
                        <select name="cha" required>
                        <?php
                        $resCha = mysqli_query($conn, "SELECT numChasis_motor, marca, modelo, color, disponibilidad FROM motocicleta");
                        while ($m = mysqli_fetch_array($resCha)) {
                            $selected = ($m['numChasis_motor'] == $fila['numChasis_motor']) ? "selected" : "";
                            echo "<option value='{$m['numChasis_motor']}' $selected>{$m['marca']} {$m['modelo']} {$m['color']} {$m['disponibilidad']}</option>";
                        }
                        ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Cliente</label></td>
                    <td>
                        <select name="cic" required>
                        <?php
                        $resCli = mysqli_query($conn, "SELECT ciCliente, nombre, apellidoPaterno, apellidoMaterno FROM clientes");
                        while ($c = mysqli_fetch_array($resCli)) {
                            $selected = ($c['ciCliente'] == $fila['ciCliente']) ? "selected" : "";
                            echo "<option value='{$c['ciCliente']}' $selected>{$c['nombre']} {$c['apellidoPaterno']} {$c['apellidoMaterno']}</option>";
                        }
                        ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Cantidad</label></td>
                    <td><input type="number" name="can" value="<?php echo $fila['cantidad']; ?>" required></td>
                </tr>
                <tr>
                    <td><label>Fecha</label></td>
                    <td><input type="date" name="fec" value="<?php echo $fila['fecha']; ?>" required></td>
                </tr>
                <tr>
                    <td><label>Hora</label></td>
                    <td><input type="time" name="hor" value="<?php echo $fila['hora']; ?>" required></td>
                </tr>
                <tr>
                    <td><label>Productos</label></td>
                    <td><input type="text" name="pro" value="<?php echo $fila['productos']; ?>" required></td>
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
