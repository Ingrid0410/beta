<?php
   //DB connection
   require('../../config/db_connection.php');
   //Get data from register form
   $email = $_POST['email'];	
   $pass = $_POST['passwd'];
   $enc_pass = md5($pass);
   //validate if email already email
   $query = "SELECT * FROM users WHERE email = '$email'";
   $result = pg_query($conn, $query);
   $row = pg_fetch_assoc($result);
   
   if($row) {
     echo "<script>alert('Email already exists!');</script>";
     header('Refresh:0;url=http://127.0.0.1/beta/api/src/register_form.html');
     exit;
   }
   //query to inset data into user table
   $query = "INSERT INTO users (email, password) 
             VALUES ('$email', '$enc_pass')";
   //Execute the query
   $result = pg_query($conn, $query);
   
   //Check if the query was successful
   if($result) {
     // echo "Registration successful!";
     echo "<script>alert('Registration successful!');</script>";
     header('Refresh:0;url=http://127.0.0.1/beta/api/src/login_form.html');
   } else {
      echo "Registration failes: ";
   }

   pg_close($conn);



   //echo "Email: " . $email;
   //echo "<br>Passwords: " . $pass;
   //echo "<br>Enc. Password: " . $enc_pass;
?>

