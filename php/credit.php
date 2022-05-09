<?php 

require "config.php";
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location: php/login.php");
  exit;
}

$sql = "UPDATE `users` SET `credit` = credit + 5 WHERE `users`.`id` = {$_SESSION['id']}";
$result = mysqli_query($conn, $sql);
if($result){
    echo " + 5$";
} else {
    echo "Something went wrong";
}

?>