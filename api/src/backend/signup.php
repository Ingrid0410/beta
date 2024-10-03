<?php
   //DB connection
   require('../../config/db_connection.php');
   //Get data from register form
   $email = $_POST['email'];	
   $pass = $_POST['passwd'];
   $enc_pass = md5($pass);
   //query to inset data into user table
   $query = "INSERT INTO users (email, password) 
             VALUES ('$email', '$enc_pass')";
   //Execute the query
   $result = pg_query($conn, $query);
   
   //Check if the query was successful
   if($result) {
      echo "Registration successful!";
   } else {
      echo "Registration failes: ";
   }

   pg_close($conn);



   //echo "Email: " . $email;
   //echo "<br>Passwords: " . $pass;
   //echo "<br>Enc. Password: " . $enc_pass;
?>

