<?php
include("../PHP/conectar.php"); // Ajusta la ruta si es necesario
$conn = conexion();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro del Mantenimiento de Mecánicos</title>
    <script>
        function confirmaBorrar() {
            return confirm('¿Seguro de borrar?');
        }
    </script>
</head>
<body>
    <h2>Registro del Mantenimiento de Mecánicos</h2>
    <form action="../PHP/RegMan_Mec.php" method="post">
        <?php
            $sql="SELECT * FROM mecanicos";
            $resultado=mysqli_query($conn,$sql);
        ?>
        <label for="ci">CI del Mecánico</label><br>
        <select name="ci">
            <?php while($fila=mysqli_fetch_array($resultado)) { ?>
                <option value="<?php echo $fila['ci']; ?>">
                    <?php echo $fila['nombre']." ".$fila['apellidoPaterno']." ".$fila['apellidoMaterno']; ?>
                </option>
            <?php } ?>
        </select>
        <br><br>

        <?php
            $sql="SELECT * FROM mantenimiento";
            $resultado=mysqli_query($conn,$sql);
        ?>
        <label for="codMantenimiento">Código del Mantenimiento</label><br>
        <select name="codMantenimiento">
            <?php while($fila=mysqli_fetch_array($resultado)) { ?>
                <option value="<?php echo $fila['codMantenimiento']; ?>">
                    <?php echo $fila['codMantenimiento']; ?>
                </option>
            <?php } ?>
        </select>
        <br><br>
        <button type="submit">Registrar</button>
        <button type="reset">Limpiar</button>
    </form>

    <hr>

    <h2>Mantenimiento de Mecánicos</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Id</th>
            <th>CI</th>
            <th>Código del Mantenimiento</th>
            <th colspan="2">Acciones</th>
        </tr>
        <?php
            $sql="SELECT * FROM mantenimiento_mecanicos";
            $tabla=mysqli_query($conn,$sql);
            while($fila=mysqli_fetch_array($tabla)) {
        ?>
        <tr>
            <td><?php echo $fila['id']; ?></td>
            <td><?php echo $fila['ci']; ?></td>
            <td><?php echo $fila['codMantenimiento']; ?></td>
            <td><a href="FormMan_Mec.php?id=<?php echo $fila['id']; ?>">Editar</a></td>
            <td><a onclick="return confirmaBorrar();" href="../PHP/Eliminar/EliminarMan_Mec.php?key=<?php echo $fila['id']; ?>">Eliminar</a></td>
        </tr>
        <?php } ?>
    </table>

    <?php
    // Sección de edición si se recibe ?id= en la URL
    if(isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $sql = "SELECT * FROM mantenimiento_mecanicos WHERE id=$id";
        $res = mysqli_query($conn,$sql);
        if($fila=mysqli_fetch_array($res)) {
    ?>
    <hr>
    <h2>Editar Mantenimiento de Mecánico</h2>
    <form action="../PHP/Editar/EditarMan_Mec.php" method="post">
        <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
        <label for="ci">CI del Mecánico</label><br>
        <input type="number" name="ci" value="<?php echo $fila['ci']; ?>"><br><br>
        <label for="codMantenimiento">Código del Mantenimiento</label><br>
        <input type="number" name="codMantenimiento" value="<?php echo $fila['codMantenimiento']; ?>"><br><br>
        <button type="submit">Modificar Cambios</button>
    </form>
    <?php } } ?>

</body>
</html>
<?php mysqli_close($conn); ?>
