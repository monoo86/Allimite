<?php
    function conexion ()
    {
        //CREAR VARIABLES DE CONEXION
        $servername="localhost";
        $username="root";
        $password="";
        $database="allimite2";

        //REALIZAMOS LA CONEXION
        //mysqli_connect(servidor,usuario,password,basededatos)
        $conn=mysqli_connect($servername,$username,$password,$database);

        //VERIFICAR SI LA CONEXION SE REALIZO
        if($conn)
        {
            //SI SE REALIZO LA CONEXION
            return $conn;
        }
        else
        {
            //NO SE REALIZO LA CONEXION
            die("No se realizo la conexion".mysqli_connect_error());
        }
    }


?>