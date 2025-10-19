<?php
include("../PHP/conectar.php");
$conn = conexion();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagos</title>
    <script>
        function confirmaBorrar() {
            return confirm('¿Seguro de borrar?');
        }
    </script>
</head>
<body>
    <h2>Registrar Pago</h2>
    <form action="../PHP/RegPago.php" method="post">

        <?php
        // Lista de compras para seleccionar
        $sql = "SELECT codCompra, ciCliente, numChasis_motor FROM compra";
        $resultado = mysqli_query($conn,$sql);
        ?>
        <label for="com">Elige compra</label><br>
        <select name="com" required>
            <?php
            while ($fila = mysqli_fetch_array($resultado)) {
                echo "<option value='{$fila['codCompra']}'>{$fila['ciCliente']} // {$fila['numChasis_motor']}</option>";
            }
            ?>
        </select>
        <br><br>

        <label for="con">Confirmación de pago</label>
        <input type="checkbox" name="con" value="1"><br><br>

        <label for="can">Cantidad</label>
        <input type="number" name="can" required><br><br>

        <label for="mon">Moneda</label>
        <input type="text" name="mon" required><br><br>

        <label for="tip">Tipo</label>
        <input type="text" name="tip" required><br><br>

        <label for="est">Estado pago</label>
        <input type="text" name="est" required><br><br>

        <button type="submit">Registrar</button>
        <button type="reset">Limpiar</button>
    </form>

    <hr>

    <h2>Lista de Pagos</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Código de pago</th>
            <th>Confirmación</th>
            <th>Moneda</th>
            <th>Estado</th>
            <th>Cantidad</th>
            <th>Tipo</th>
            <th>Código Compra</th>
            <th colspan="2">Acciones</th>
        </tr>
        <?php
        $sql = "SELECT * FROM pago";
        $tabla = mysqli_query($conn, $sql);
        while ($fila = mysqli_fetch_array($tabla)) {
        ?>
            <tr>
                <td><?php echo $fila['codPago']; ?></td>
                <td><?php echo $fila['confirmacionPago']; ?></td>
                <td><?php echo $fila['moneda']; ?></td>
                <td><?php echo $fila['estado']; ?></td>
                <td><?php echo $fila['cantidad']; ?></td>
                <td><?php echo $fila['tipo']; ?></td>
                <td><?php echo $fila['codCompra']; ?></td>
                <td><a href="FormPago.php?codPago=<?php echo $fila['codPago']; ?>">Editar</a></td>
                <td><a onclick="return confirmaBorrar();" href="../PHP/Eliminar/EliminarPago.php?key=<?php echo $fila['codPago']; ?>">Eliminar</a></td>
            </tr>
        <?php
        }
        ?>
    </table>

    <hr>

    <?php
    // Bloque de edición
    if (isset($_GET['codPago'])) {
        $codPago = intval($_GET['codPago']);
        $sql = "SELECT * FROM pago WHERE codPago=$codPago";
        $resultado = mysqli_query($conn, $sql);
        if ($fila = mysqli_fetch_array($resultado)) {
    ?>
        <h2>Editar Pago</h2>
        <form action="../PHP/Editar/EditarPago.php" method="post">
            <table align="center" border="0">
                <tr>
                    <td><label>Código de pago</label></td>
                    <td><input type="number" name="codPago" value="<?php echo $fila['codPago']; ?>" readonly></td>
                </tr>
                <tr>
                    <td><label>Código Compra</label></td>
                    <td>
                        <?php
                        $sql2 = "SELECT codCompra, ciCliente, numChasis_motor FROM compra";
                        $res2 = mysqli_query($conn, $sql2);
                        ?>
                        <select name="com">
                            <?php
                            while ($c = mysqli_fetch_array($res2)) {
                                $selected = ($c['codCompra'] == $fila['codCompra']) ? "selected" : "";
                                echo "<option value='{$c['codCompra']}' $selected>{$c['ciCliente']} // {$c['numChasis_motor']}</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Confirmación de pago</label></td>
                    <td><input type="checkbox" name="con" value="1" <?php if($fila['confirmacionPago']) echo "checked"; ?>></td>
                </tr>
                <tr>
                    <td><label>Cantidad</label></td>
                    <td><input type="number" name="can" value="<?php echo $fila['cantidad']; ?>"></td>
                </tr>
                <tr>
                    <td><label>Moneda</label></td>
                    <td><input type="text" name="mon" value="<?php echo $fila['moneda']; ?>"></td>
                </tr>
                <tr>
                    <td><label>Tipo</label></td>
                    <td><input type="text" name="tip" value="<?php echo $fila['tipo']; ?>"></td>
                </tr>
                <tr>
                    <td><label>Estado</label></td>
                    <td><input type="text" name="est" value="<?php echo $fila['estado']; ?>"></td>
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
