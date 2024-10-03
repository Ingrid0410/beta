<?php
     /*
    Postgres Database connection
    development: Jorge
    */

    //entrar en el navegador 127.0.0.1/beta/api/config/db_conncetion.php 

    //Creacion de variables
    $host = "localhost"; //127.0.0.1
    $username    = "postgres";
    $password   = "unicesmag";
    $dbname     = "beta";
    $port       = "5432";

    $data_connectionn = "
       host     = $host
       port     = $port
       dbname   = $dbname
       user     = $username
       password = $password
    ";

    $conn = pg_connect($data_connectionn);

    if (!$conn) {
        die("Connection failed: ". pg_last_error());
    }else{
        //echo "Connected successfully";
    }

    //pg_close($conn);

?>