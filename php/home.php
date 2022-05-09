<?php 
    include '../php/config.php';
    session_start();

    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
        header("location: login.php");
    }

    if(isset($_POST['btn'])) {
        $number = $_POST['nr1'];

        if(!empty($number)) {
            $rand = rand(0,20);

            if($rand == $number){
                echo "You Win!";
                $sql = $db->query("INSERT INTO numbers(numbers, results) VALUES('$number', 'win')");
            } else {
                echo "You lose!";
                $sql = $db->query("INSERT INTO numbers(numbers, results) VALUES('$number', 'lose')");
            }
        }
    }

    if(isset($_POST['reset'])) {
        $sql = $db->query("TRUNCATE TABLE numbers");
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
    <link rel="stylesheet" href="../css/game1.css">
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
        <h2 class="welcome" > <?php echo "Welcome ". $_SESSION['username'] ?> You Can Use This Website Now! </h2>
    </div>

    <button style="padding: 2em;" > <a style="color: red; font-weight: bold; font-size: large;" href="../game_time.php"> CLICK HERE TO PLAY GAMES AND TRY YOUR LUCK</a> </button>
</body>
</html>