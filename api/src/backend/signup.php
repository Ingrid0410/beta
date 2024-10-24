<?php
   //DB connection
   require('../../config/db_connection.php');
   //Get data from register form
   $email = $_POST['email'];	
   $pass = $_POST['passwd'];
   //Encrypt password with md5 hashing algorithm
   $enc_pass = md5($pass);
   //query to inset data into user table
   $query = "SELECT * from users where email = '$email'";
   $result = pg_query($conn, $query);
   $row = pg_fetch_assoc($result);
   if($row) {
      // echo "Registration successful!";
      echo "<script>alert('Email already exist!');</script>";
      header('Refresh:0;url=http://127.0.0.1/beta/api/src/register_form.html');
      exit();
   }
   
   //validate if email already exists
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

?>