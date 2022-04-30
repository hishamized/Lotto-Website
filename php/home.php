<?php 
    session_start();

    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
        header("location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../css/gloabal.css">
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
            <li class="nav-item"> <a href="./login.php"> LOG-IN </a> </li>
            <li class="nav-item"> <a href="./php/signup.php"> SIGN-UP </a> </li>
            <li class="nav-item"> <a href="logout.php"> LOG-OUT </a> </li>
        </ul>
    </nav>

    <div class="welcome">
        <h2> <?php echo "Welcome ". $_SESSION['username'] ?> You Can Use This Website Now! </h2>
    </div>
</body>
</html>