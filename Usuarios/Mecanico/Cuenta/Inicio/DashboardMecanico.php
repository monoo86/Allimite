<?php
session_start();
$nombre=$_SESSION['nombre'];
$tipo=$_SESSION['tipo'];

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../estilos/estiloDashboard.css">
</head>
<body>
    <header>
        <div id="imagen">
            <img src="../../imagenes/tiburon.png" alt="Imgen no cargada">
        </div>
        <div id="titulo">
            <h1>Sistema de Mecanicos</h1>
            <h2>bienvenido <?php echo $nombre;?></h2>
        </div>
    </header>
    <main>
        <aside>
            <div id="perfil">
                <img src="../../imagenes/user-icon-on-transparent-background-free-png.webp" alt="sin usado">
                <h4><?php echo $nombre;?></h4>
            </div>
            <nav>
                <a href="#">Inicio</a>
                <a href="#">Mantenimiento</a>
                <a href="#">Mantenimiento Mecanicos</a>
                <a href="#">Motocicleta</a>
                <a href="#">Ver asignatura</a>
            </nav>
        </aside>
        <section>
            <h2>el contenido del only de tu abuela</h2>
        </section>
    </main>
    <footer>
        <div id="nombre">
            <h3>nombre del triplehijuepta sistema</h3>
            <p>empresa de narcotrafico de tetas</p>
        </div>
        <div id="copy">
            <h3>cp y mas anti furros</h3>
            <p>sistema de mi prepusio exotico</p>
            </div>
        <div id="contactos">
            <p>contacto de tu mamita</p>
            <p>783174 numero de un femboy</p>
            <p>contacta con esta pta barata</p>
        </div>
    </footer>
</body>
</html>