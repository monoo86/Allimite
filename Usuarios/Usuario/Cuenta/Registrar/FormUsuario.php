<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allimite</title>
    <link rel="stylesheet" href="../../estilos/Inicio.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <header>
        <nav class="nav">
            <div class="navCon">
                <figure class="navFig">
                    <img src="../../imagenes/tiburon.png" alt="Imgen no cargada" class="navLogo">
                </figure>
                <label class="navToggle">
                    <input type="checkbox" id="menuInput" class="navInput">
                </label>
                <ul class="navList">
                    <li class="navItem">
                        <a href="#" class="navLink">Inicio sesion</a>
                    </li>
                    <li class="navItem">
                        <a href="#" class="navLink">principal</a>
                    </li>
                    <li class="navItem">
                        <a href="#" class="navLink">catalogo</a>
                    </li>
                    <li class="navItem">
                        <a href="#" class="navLink">promociones</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div class="form">
                <div id="row">
                <article id="izquierda">
            <img src="../../imagenes/tiburon.png" >
                </article>
                <article id="centro">
            <img src="../../imagenes/GAFAS SIN FONDO.png" height="210px"> 
        </article>
        <article id="derecha">
            <img src="../../imagenes/tiburon.png" >
        </article>
        </div>
            <h2>Registrar Usuario</h2>
            <form method="post" action="../../PHP/RegUsuario.php">
                <div class="usuario">
                    <input type="text" name="nom" required placeholder="Monkey_pilfrut86">
                    <br>
                    <label for="nom">Nombre de Usuario</label>
                </div>
                <div class="contra">
                    <input type="password" name="con" required placeholder="***********">
                    <br>
                    <label for="con">contraseña</label>
                </div>
                <div class="usuario">
                    <select name="tip" >
                        <option value="Admin">Admin</option>
                        <option value="Usuario">Usuario</option>
                        <option value="AsesorComercial">Asesor Comercial</option>
                        <option value="Mecanico">Mecanico</option>
                    </select>
                    <br>
                    <label for="tip">tipo de usurario</label>
                </div>
                <br>
                
                <input type="submit" value="REGISTRATE" class="REGISTRATE">
            </form>
        </div>
    </main>
    <footer>
        <section>
            <div>
                <a href="#"><img src="../../imagenes/logos empresas/1.1.png" alt="Imgen no cargada"></a>
            </div>
            <div>
                <a href="#"><img src="../../imagenes/logos empresas/1.2.png" alt="Imgen no cargada"></a>
            </div>
            <div>
                <a href="#"><img src="../../imagenes/logos empresas/1.3.png" alt="Imgen no cargada"></a>
            </div>
            <div>
                <a href="#"><img src="../../imagenes/logos empresas/1.4.png" alt="Imgen no cargada"></a>
            </div>
            <div>
                <a href="#"><img src="../../imagenes/logos empresas/1.5.png" alt="Imgen no cargada"></a>
            </div>
            <div>
                <a href="#"><img src="../../imagenes/logos empresas/1.6.png" alt="Imgen no cargada"></a>
            </div>
            <div>
                <a href="#"><img src="../../imagenes/logos empresas/1.7.png" alt="Imgen no cargada"></a>
            </div>
        </section>
        
        <section>
            <div>
                <a href="#"><img src="../../imagenes/logos empresas/2.1.png" alt="Imgen no cargada"></a>
            </div>
            <div>
                <a href="#"><img src="../../imagenes/logos empresas/2.2.png" alt="Imgen no cargada"></a>
            </div>
            <div>
                <a href="#"><img src="../../imagenes/logos empresas/2.3.png" alt="Imgen no cargada"></a>
            </div>
            <div>
                <a href="#"><img src="../../imagenes/logos empresas/2.4.png" alt="Imgen no cargada"></a>
            </div>
            <div>
                <a href="#"><img src="../../imagenes/logos empresas/2.5.png" alt="Imgen no cargada"></a>
            </div>
            <div>
                <a href="#"><img src="../../imagenes/logos empresas/2.6.png" alt="Imgen no cargada"></a>
            </div>
        </section>
    </footer>
</body>
</html>