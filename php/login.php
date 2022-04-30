<?php
session_start();

if(isset($_SESSION['username']))
{
    header("location: home.php");
    exit;
}
require_once "config.php";

$username = $password = "";
$err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter username + password";
    }
    else{
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }


if(empty($err))
{
    $sql = "SELECT id, username, password FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $username;
    
    
    
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password, $hashed_password))
                        {
                            
                            session_start();
                            $_SESSION["username"] = $username;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;

                            
                            header("location: home.php");
                            
                        } else echo "Error";
                    }

                }
            }
       }
   }         



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-In</title>
    <link rel="stylesheet" href="../css/gloabal.css">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
<nav class="nav">
        <div class="logo">LOTTO WEBSITE</div>
        <ul class="nav-left">
            <li class="nav-item" > <a href="#"> LOTTO </a> </li>
            <li class="nav-item"> <a href="#"> SPORTS BETTING </a> </li>
            <li class="nav-item"> <a href="#"> LIVE BETTING </a> </li>
            <li class="nav-item"> <a href="#"> VIRTUAL </a> </li>
        </ul>
        <ul class="nav-right">
            <li class="nav-item"> <a href="login.php"> LOG-IN </a> </li>
            <li class="nav-item"> <a href="signup.php"> SIGN-UP </a> </li>
        </ul>
    </nav>

    <section class="form-container">
        <form action="" method="POST" class="form">
            <div class="form-item username">
                <label for="">Username</label>
                <input name="username" type="text">
            </div>
            <div class="form-item password">
                <label for="">Password</label>
                <input name="password" type="password">
            </div>
            <div class="form-item">
                <button type="submit" class="button">
                Log-In
                </button>
            </div>
        </form>
    </section>
</body>
</html>