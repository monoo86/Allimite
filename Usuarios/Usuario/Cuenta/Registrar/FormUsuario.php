<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allimite</title>
    <link rel="stylesheet" href="../Registrar/Inicio.css">
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
                        <button type="submit" value="Admin" id="admin">Administrador</button>
                        <button type="submit" value="Asesor Comercial" id="Asesor">Asesor Comercial</button>
                        <button type="submit" value="Mecanico" id="Mecanico">Mecanico</button>
                        <button type="submit" value="User" id="user">Usuario</button>
                    <br>
                </div>
            <form action="#" method="post">
                <div class="usuario">
                    <input type="text" name="ciAdmin">
                    <br>
                    <label for="ciAdmin" placeholder="12554546">Carnet de Identidad</label>
                    <input type="text" name="nom">
                    <br>
                    <label for="nom">Nombres</label>
                    <br>
                    <input type="text" name="app" required>
                    <br>
                    <label for="app">Apellidos</label>
                    <br>
                    <input type="mail" name="correo">
                    <br>
                    <label for="correo">correo</label>
                    <br>
                    <input type="password" for=con>
                    <br>
                    <label for="con">contraseña</label>
                    
                </div>
                <br>
                
                <input type="submit" value="REGISTRATE" class="REGISTRATE">
            </form>
                </div>
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