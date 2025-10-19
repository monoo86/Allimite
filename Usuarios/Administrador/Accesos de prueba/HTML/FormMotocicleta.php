<?php
    include("../PHP/conectar.php");
    $conn = conexion();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Motocicleta</title>
    <script>
        function confirmaBorrar() {
            return confirm('¿Seguro de borrar?');
        }
    </script>
</head>
<body>
    <h2>Registro de Motocicleta</h2>
    <form action="../PHP/RegMotocicleta.php" method="post">
        <label for="num">Número de Chasis del Motor</label><br>
        <input type="number" name="num"><br><br>

        <label for="mar">Marca</label><br>
        <input type="text" name="mar"><br><br>

        <label for="cm2">Cm2</label><br>
        <input type="number" step="any" name="cm2"><br><br>

        <label for="mod">Modelo</label><br>
        <input type="text" name="mod"><br><br>

        <label for="col">Color</label><br>
        <input type="text" name="col"><br><br>

        <label for="pot">Potencia</label><br>
        <input type="number" step="any" name="pot"><br><br>

        <label for="dis">Disponibilidad</label><br>
        <input type="radio" name="dis" value="1" id="dis_si">
        <label for="dis_si">Sí</label><br>
        <input type="radio" name="dis" value="0" id="dis_no">
        <label for="dis_no">No</label><br><br>

        <?php
            $sql = "SELECT * FROM distribuidora";
            $resultado = mysqli_query($conn, $sql);
        ?>
        <label for="nit">Nit</label><br>
        <select name="nit">
            <?php while($fila = mysqli_fetch_array($resultado)) { ?>
                <option value="<?php echo $fila['nit']; ?>"><?php echo $fila['nit']; ?></option>
            <?php } ?>
        </select>
        <br><br>

        <button type="submit">Registrar</button>
        <button type="reset">Limpiar</button>
    </form>

    <hr>

    <h2>Lista de Motocicletas</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Número de Chasis del Motor</th>
            <th>Marca</th>
            <th>Cm2</th>
            <th>Modelo</th>
            <th>Color</th>
            <th>Potencia</th>
            <th>Disponibilidad</th>
            <th>Nit</th>
            <th colspan="2">Acciones</th>
        </tr>
        <?php
            $sql = "SELECT * FROM motocicleta";
            $tabla = mysqli_query($conn, $sql);
            while($fila = mysqli_fetch_array($tabla)) {
        ?>
            <tr>
                <td><?php echo $fila['numChasis_motor']; ?></td>
                <td><?php echo $fila['marca']; ?></td>
                <td><?php echo $fila['Cm2']; ?></td>
                <td><?php echo $fila['modelo']; ?></td>
                <td><?php echo $fila['color']; ?></td>
                <td><?php echo $fila['potencia']; ?></td>
                <td><?php echo $fila['disponibilidad'] ? 'Sí' : 'No'; ?></td>
                <td><?php echo $fila['nit']; ?></td>
                <td><a href="FormMotocicleta.php?num=<?php echo $fila['numChasis_motor']; ?>">Editar</a></td>
                <td><a onclick="return confirmaBorrar();" href="../PHP/Eliminar/EliminarMotocicleta.php?key=<?php echo $fila['numChasis_motor']; ?>">Eliminar</a></td>
            </tr>
        <?php } ?>
    </table>

    <hr>

    <?php
    // Bloque de edición si se pasa ?num= en la URL
    if (isset($_GET['num'])) {
        $num = intval($_GET['num']);
        $sql = "SELECT * FROM motocicleta WHERE numChasis_motor=$num";
        $resultado = mysqli_query($conn, $sql);

        if ($fila = mysqli_fetch_array($resultado)) {
    ?>
        <h2>Editar Motocicleta</h2>
        <form action="../PHP/Editar/EditarMotocicleta.php" method="post">
            <table border="0" align="center">
                <tr>
                    <td><label for="num">Número de Chasis</label></td>
                    <td><input type="number" name="num" value="<?php echo $fila['numChasis_motor']; ?>" readonly></td>
                </tr>
                <tr>
                    <td><label for="mar">Marca</label></td>
                    <td><input type="text" name="mar" value="<?php echo $fila['marca']; ?>"></td>
                </tr>
                <tr>
                    <td><label for="cm2">Cm2</label></td>
                    <td><input type="number" step="any" name="cm2" value="<?php echo $fila['Cm2']; ?>"></td>
                </tr>
                <tr>
                    <td><label for="mod">Modelo</label></td>
                    <td><input type="text" name="mod" value="<?php echo $fila['modelo']; ?>"></td>
                </tr>
                <tr>
                    <td><label for="col">Color</label></td>
                    <td><input type="text" name="col" value="<?php echo $fila['color']; ?>"></td>
                </tr>
                <tr>
                    <td><label for="pot">Potencia</label></td>
                    <td><input type="number" step="any" name="pot" value="<?php echo $fila['potencia']; ?>"></td>
                </tr>
                <tr>
                    <td><label for="dis">Disponibilidad</label></td>
                    <td>
                        <input type="radio" name="dis" value="1" <?php if($fila['disponibilidad']==1) echo "checked"; ?>> Sí
                        <input type="radio" name="dis" value="0" <?php if($fila['disponibilidad']==0) echo "checked"; ?>> No
                    </td>
                </tr>
                <tr>
                    <td><label for="nit">Nit</label></td>
                    <td>
                        <select name="nit">
                            <?php
                                $sqlDist = "SELECT * FROM distribuidora";
                                $resDist = mysqli_query($conn, $sqlDist);
                                while($d = mysqli_fetch_array($resDist)) {
                                    $selected = ($d['nit']==$fila['nit']) ? "selected" : "";
                                    echo "<option value='{$d['nit']}' $selected>{$d['nit']}</option>";
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
