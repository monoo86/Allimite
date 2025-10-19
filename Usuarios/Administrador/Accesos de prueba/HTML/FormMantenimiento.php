<?php
include("../PHP/conectar.php");
$conn = conexion();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro del Mantenimiento</title>
    <script>
        function confirmaBorrar() {
            return confirm('¿Seguro de borrar?');
        }
    </script>
</head>
<body>
    <h2>Registro del Mantenimiento</h2>
    <form action="../PHP/RegMantenimiento.php" method="post">
        <label for="fec">Fecha</label><br>
        <input type="date" name="fec"><br><br>

        <label for="des">Descripción</label><br>
        <textarea name="des" cols="30" rows="5"></textarea><br><br>

        <label for="reg">Registro</label><br>
        <textarea name="reg" cols="30" rows="5"></textarea><br><br>

        <label for="ent">Entrega</label><br>
        <input type="date" name="ent"><br><br>

        <label for="hor">Horario</label><br>
        <input type="time" name="hor"><br><br>

        <label for="pre">Precio</label><br>
        <input type="number" step="any" name="pre"><br><br>

        <label for="tip">Tipo</label><br>
        <input type="text" name="tip"><br><br>

        <?php
            $sql = "SELECT * FROM motocicleta";
            $resultado = mysqli_query($conn, $sql);
        ?>
        <label for="num">Número de Chasis del motor</label><br>
        <select name="num">
            <?php while($fila=mysqli_fetch_array($resultado)) { ?>
                <option value="<?php echo $fila['numChasis_motor']; ?>"><?php echo $fila['numChasis_motor']; ?></option>
            <?php } ?>
        </select>
        <br><br>

        <button type="submit">Registrar</button>
        <button type="reset">Limpiar</button>
    </form>

    <hr>

    <h2>Lista de Mantenimientos</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Código</th>
            <th>Fecha</th>
            <th>Descripción</th>
            <th>Registro</th>
            <th>Entrega</th>
            <th>Horario</th>
            <th>Precio</th>
            <th>Tipo</th>
            <th>Número de Chasis</th>
            <th colspan="2">Acciones</th>
        </tr>
        <?php
            $sql = "SELECT * FROM mantenimiento";
            $tabla = mysqli_query($conn, $sql);
            while($fila=mysqli_fetch_array($tabla)) {
        ?>
            <tr>
                <td><?php echo $fila['codMantenimiento']; ?></td>
                <td><?php echo $fila['fecha']; ?></td>
                <td><?php echo $fila['descripcion']; ?></td>
                <td><?php echo $fila['registro']; ?></td>
                <td><?php echo $fila['entrega']; ?></td>
                <td><?php echo $fila['horario']; ?></td>
                <td><?php echo $fila['precio']; ?></td>
                <td><?php echo $fila['tipo']; ?></td>
                <td><?php echo $fila['numChasis_motor']; ?></td>
                <td><a href="FormMantenimiento.php?cod=<?php echo $fila['codMantenimiento']; ?>">Editar</a></td>
                <td><a onclick="return confirmaBorrar();" href="../PHP/Eliminar/EliminarMantenimiento.php?key=<?php echo $fila['codMantenimiento']; ?>">Eliminar</a></td>
            </tr>
        <?php } ?>
    </table>

    <hr>

    <?php
    // Bloque de edición si se pasa ?cod= en la URL
    if (isset($_GET['cod'])) {
        $cod = intval($_GET['cod']);
        $sql = "SELECT * FROM mantenimiento WHERE codMantenimiento=$cod";
        $resultado = mysqli_query($conn, $sql);

        if ($fila = mysqli_fetch_array($resultado)) {
    ?>
        <h2>Editar Mantenimiento</h2>
        <form action="../PHP/Editar/EditarMantenimiento.php" method="post">
            <table border="0" align="center">
                <tr>
                    <td><label for="cod">Código</label></td>
                    <td><input type="number" name="cod" value="<?php echo $fila['codMantenimiento']; ?>" readonly></td>
                </tr>
                <tr>
                    <td><label for="fec">Fecha</label></td>
                    <td><input type="date" name="fec" value="<?php echo $fila['fecha']; ?>"></td>
                </tr>
                <tr>
                    <td><label for="des">Descripción</label></td>
                    <td><textarea name="des" cols="30" rows="5"><?php echo $fila['descripcion']; ?></textarea></td>
                </tr>
                <tr>
                    <td><label for="reg">Registro</label></td>
                    <td><textarea name="reg" cols="30" rows="5"><?php echo $fila['registro']; ?></textarea></td>
                </tr>
                <tr>
                    <td><label for="ent">Entrega</label></td>
                    <td><input type="date" name="ent" value="<?php echo $fila['entrega']; ?>"></td>
                </tr>
                <tr>
                    <td><label for="hor">Horario</label></td>
                    <td><input type="time" name="hor" value="<?php echo $fila['horario']; ?>"></td>
                </tr>
                <tr>
                    <td><label for="pre">Precio</label></td>
                    <td><input type="number" step="any" name="pre" value="<?php echo $fila['precio']; ?>"></td>
                </tr>
                <tr>
                    <td><label for="tip">Tipo</label></td>
                    <td><input type="text" name="tip" value="<?php echo $fila['tipo']; ?>"></td>
                </tr>
                <tr>
                    <td><label for="num">Número de Chasis</label></td>
                    <td>
                        <select name="num">
                            <?php
                                $sqlMoto = "SELECT * FROM motocicleta";
                                $resMoto = mysqli_query($conn, $sqlMoto);
                                while($m = mysqli_fetch_array($resMoto)) {
                                    $selected = ($m['numChasis_motor'] == $fila['numChasis_motor']) ? "selected" : "";
                                    echo "<option value='{$m['numChasis_motor']}' $selected>{$m['numChasis_motor']}</option>";
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
    mysqli_close($conn);
    ?>
</body>
</html>
