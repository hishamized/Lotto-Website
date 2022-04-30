<?php 
   
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_NAME', 'lotto');

   $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

   if($conn == false){
       die('Error: cannot connect because -->'. mysqli_connect_error($conn));
   } else {
       echo "Connected to the database!";
   }
?>