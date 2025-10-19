<?php
    function conexion ()
    {
        //VARIABLES CONEXION
        $servername="localhost";
        $username="root";
        $password="";
        $database="proyecto";

        //LA CONEXION
        //mysqli_connect(servidor,usuario,password,basededatos)
        $conn=mysqli_connect($servername,$username,$password,$database);

        //VERIFICAR LA CONEXION
        if($conn)
        {
            //SI SE REALIZO
            return $conn;
        }
        else
        {
            //NO SE REALIZO
            die("No se realizo la conexion".mysqli_connect_error());
        }
    }


?>