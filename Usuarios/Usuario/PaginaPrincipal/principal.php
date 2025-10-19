<?php
include("../../../Conectar/conectar.php");
$conn = conexion();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allimite</title>
    <link rel="stylesheet" href="principal.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <main>
        <header>
            
            <nav id="modelos1">
                <button onclick="getElementById('modelosD').showModal();"><h3>MODELOS <i class="bi bi-caret-down-fill"></i></h3></button>
            </nav>

            <dialog id="modelosD">
                <section id="modelos">
                   <div>
                       <h2>MODELOS  <i class="bi bi-caret-up-fill"></i></h2>
                       <div id="modmed">
                           <ul>
                               <li class="modimg">
                                   <img src="../imagenes/modelos/1.1.png" alt="Imgen no cargada">
                               </li>
                               <li class="marca">
                                   <img src="../imagenes/modelos/2.1.png" alt="Imgen no cargada">
                               </li>
                               <li class="tex">
                                   <h4>FASTWIND 200 XD</h4>
                               </li>
                               <li class="carac">
                                   <a href="#">Ver Caracteristicas</a>
                               </li>
                           </ul>
                           <ul>
                               <li class="modimg">
                                   <img src="../imagenes/modelos/1.2.png" alt="Imgen no cargada">
                               </li>
                               <li class="marca">
                                   <img src="../imagenes/modelos/2.2.png" alt="Imgen no cargada">
                               </li>
                               <li class="tex">
                                   <h4>K2</h4>
                               </li>
                               <li class="carac">
                                   <a href="#">Ver Caracteristicas</a>
                               </li>
                           </ul>
                           <ul>
                               <li class="modimg">
                                   <img src="../imagenes/modelos/1.3.png" alt="Imgen no cargada">
                               </li>
                               <li class="marca">
                                   <img src="../imagenes/modelos/2.3.png" alt="Imgen no cargada">
                               </li>
                               <li class="tex">
                                   <h4>CAMALEONE 400</h4>
                               </li>
                               <li class="carac">
                                   <a href="#">Ver Caracteristicas</a>
                               </li>
                           </ul>
                       </div>
                       <div id="modabajo">
                           <a href="../catalogo/Catalogo.html">Ver todo el catalogo</a>
                       </div>
                       <button class="cerrar" onclick="getElementById('modelosD').close();">Cerrar</button>
                   </div>
               </section>
            </dialog>

            <nav id="promociones1">
                <button onclick="getElementById('promocionesD').showModal();"><h3>PROMOCIONES  <i class="bi bi-caret-down-fill"></i></h3></button>
            </nav>

            <dialog id="promocionesD">
                <section id="promociones">
                    <div>
                        <h2>PROMOCIONES  <i class="bi bi-caret-up-fill"></i></h2>
                        <div>
                            <a href="../promociones/Promociones.html">
                                <img src="../imagenes/promociones/1.png" alt="Imgen no cargada">
                                <h4>Regalos y recompensas</h4>
                            </a>
                            <a href="../promociones/Promociones.html">
                                <img src="../imagenes/promociones/2.png" alt="Imgen no cargada">
                                <h4>Promociones y descuentos</h4>
                            </a>
                            <a href="../promociones/Promociones.html">
                                <img src="../imagenes/promociones/3.png" alt="Imgen no cargada">
                                <h4>Descuentos de Servicio tecnico</h4>
                            </a>
                        </div>
                        <button class="cerrar" onclick="getElementById('promocionesD').close();">Cerrar</button>
                    </div>
                </section>
            </dialog>

            <nav id="med">
                <a href=""><img src="../imagenes/tiburon.png" alt="Imgen no cargada"></a>
            </nav>

            <nav section id="nosotros1">
                <button onclick="getElementById('nosotrosD').showModal();"><h3>NOSOTROS  <i class="bi bi-caret-down-fill"></i></h3></button>
            </nav>

            <dialog id="nosotrosD">
                <section id="nosotros">
                    <div>
                        <h2>NOSOTROS  <i class="bi bi-caret-up-fill"></i></h2>
                        <div id="imag">
                            <img src="../imagenes/nosotros/Grupo 1.png" alt="Imgen no cargada">
                        </div>
                        <div id="redes">
                            <a href="https://wa.me/message/IVES7F24ESQPN1"><i class="bi bi-whatsapp">  69859159</i></a>
                            <a href="https://www.instagram.com/al_.limite77?igsh=Z2p2cTlidzJ6ajU="><i class="bi bi-instagram">  AL_.LIMITE57</i></a>
                            <a href="https://www.tiktok.com/@al._limite?_t=ZM-8vvIACcWgbv&_r=1"><i class="bi bi-tiktok">  AL._LIMITE</i></a>
                        </div>
                        <div id="pagina">
                            <a href="../publicidad/Publicidad.html">Mas de nosotros</a>
                        </div>
                        <button class="cerrar" onclick="getElementById('nosotrosD').close();">Cerrar</button>
                    </div>
                </section>
            </dialog>

            <nav section id="acceso1">
                <button onclick="getElementById('accesoD').showModal();"><h3>ACCESO  <i class="bi bi-caret-down-fill"></i></h3></button>
            </nav>

            <dialog id="accesoD">
                <section id="acceso">
                    <div>
                        <h2>ACCESO  <i class="bi bi-caret-up-fill"></i></h2>
                        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                            <img src="../imagenes/nosotros/Grupo 1.png" alt="Imgen no cargada">
                            <div>
                                <h4>Inicio de Sesion</h4>
                                <label for="nom">Nombre de Usuario</label>
                                <input type="text" name="nom">
                                <label for="con">Contraseña</label>
                                <input type="password" name="con">
                                <button type="submit">Iniciar secion</button>
                            
                                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" id="hjas">¿Olvidaste tu contraseña?</a>
                            
                            </div>
                        </form>

                        <a href="../Cuenta/Registrar/FormUsuario.php">No tengo una cuenta</a>
                        <button class="cerrar" onclick="getElementById('accesoD').close();">Cerrar</button>
                    </div>
                </section>
            </dialog>
        </header>

        <section id="MedCon">

        </section>
    </main>
    <footer>
        <?php
        $sql="SELECT foto,pagina FROM distribuidora";
        $tabla=mysqli_query($conn,$sql);
        $i=-1;
        while($fila=mysqli_fetch_array($tabla))
        {
            ?>
             <div>
                <a href="<?php echo $fila['pagina'];?>"><img src="../imagenes/logos empresas/<?php echo $fila['foto'];?>" alt="Imgen no cargada"></a>
            </div>
            <?php
        }

        ?>
        <section>
            <div>
                <a href="#"><img src="../imagenes/logos empresas/1.1.png" alt="Imgen no cargada"></a>
            </div>
            <div>
                <a href="#"><img src="../imagenes/logos empresas/1.2.png" alt="Imgen no cargada"></a>
            </div>
            <div>
                <a href="#"><img src="../imagenes/logos empresas/1.3.png" alt="Imgen no cargada"></a>
            </div>
            <div>
                <a href="#"><img src="../imagenes/logos empresas/1.4.png" alt="Imgen no cargada"></a>
            </div>
            <div>
                <a href="#"><img src="../imagenes/logos empresas/1.5.png" alt="Imgen no cargada"></a>
            </div>
            <div>
                <a href="#"><img src="../imagenes/logos empresas/1.6.png" alt="Imgen no cargada"></a>
            </div>
            <div>
                <a href="#"><img src="../imagenes/logos empresas/1.7.png" alt="Imgen no cargada"></a>
            </div>
        </section>
        
        <section>
            <div>
                <a href="#"><img src="../imagenes/logos empresas/2.1.png" alt="Imgen no cargada"></a>
            </div>
            <div>
                <a href="#"><img src="../imagenes/logos empresas/2.2.png" alt="Imgen no cargada"></a>
            </div>
            <div>
                <a href="#"><img src="../imagenes/logos empresas/2.3.png" alt="Imgen no cargada"></a>
            </div>
            <div>
                <a href="#"><img src="../imagenes/logos empresas/2.4.png" alt="Imgen no cargada"></a>
            </div>
            <div>
                <a href="#"><img src="../imagenes/logos empresas/2.5.png" alt="Imgen no cargada"></a>
            </div>
            <div>
                <a href="#"><img src="../imagenes/logos empresas/2.6.png" alt="Imgen no cargada"></a>
            </div>
        </section>
    </footer>
</body>
</html>


<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $nom=$_POST['nom'];
    $con=$_POST['con'];

    $sql="SELECT * FROM clientes WHERE nombreUsuario='$nom' and contraseña='$con'";
    $tabla=mysqli_query($conn,$sql);
    if($fila=mysqli_fetch_array($tabla))
    {
        session_start();
        $_SESSION['nombre']=$fila['nombreUsuario'];
        $_SESSION['ci']=$fila['ciCliente'];
        $_SESSION['tip']="clientes";
        echo "<script>alert('Acesso concedido');
                window.location='DashboardUser.php';
                </script>";
    }
    else
    {
        $sql="SELECT * FROM mecanicos WHERE nombre='$nom' and contraseña='$con'";
        $tabla=mysqli_query($conn,$sql);
        if($fila=mysqli_fetch_array($tabla))
        {
            session_start();
            $_SESSION['nombre']=$fila['nombre'];
            $_SESSION['ci']=$fila['ciMecanico'];
            $_SESSION['tip']="mecanicos";
            echo "<script>alert('Acesso concedido');
                window.location='DashboardUser.php';
                </script>";
        }
        else
        {
            $sql="SELECT * FROM asesorcomercial WHERE nombre='$nom' and contraseña='$con'";
            $tabla=mysqli_query($conn,$sql);
            if($fila=mysqli_fetch_array($tabla))
            {
                session_start();
                $_SESSION['nombre']=$fila['nombre'];
                $_SESSION['ci']=$fila['ciAsesorComercial'];
                $_SESSION['tip']="asesorcomercial";
                echo "<script>alert('Acesso concedido');
                    window.location='DashboardUser.php';
                    </script>";
            }
            else
            {
                $sql="SELECT * FROM administrador WHERE nombre='$nom' and contraseña='$con'";
                $tabla=mysqli_query($conn,$sql);
                if($fila=mysqli_fetch_array($tabla))
                {
                    session_start();
                    $_SESSION['nombre']=$fila['nombre'];
                    $_SESSION['ci']=$fila['ciAdministrador'];
                    $_SESSION['tip']="administrador";
                    echo "<script>alert('Acesso concedido');
                        window.location='DashboardUser.php';
                        </script>";
                }
                else
                {
                    echo "<script>alert('Usuario o contraseña incorrecto, Acceso denegado');window.location='login.php';</script>";
                }
            }
        }
    }
}
?>