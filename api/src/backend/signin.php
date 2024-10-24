<?php

    //DB conecction
    require('../../config/db_connection.php');
    

    //Get Data from form submission
    $email = $_POST['email'];	
    $pass = $_POST['passwd'];

    //Encrypt password with md5 hashing algorithm
    $enc_pass = md5($pass);

    //Query
    $query = "
        SELECT 
        * 
        from 
        users 
        where 
        email = '$email' and 
        password = '$enc_pass'
        ";

    $result = pg_query($conn, $query);
    $row = pg_fetch_assoc($result);

    if($row) {

        header('Refresh:0;url=http://127.0.0.1/beta/api/src/home.php');
    } else {
        echo "<script>alert('invalid email or password!');</script>";
        header('Refresh:0;url=http://127.0.0.1/beta/api/src/login_form.html');
    }
    pg_close($conn);
?>