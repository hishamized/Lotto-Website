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

    <section class="game1-container">
        <h1>SELECT A RANDOM NUMBER AND TRY YOUR LUCK</h1>
        <section class="game-container">
            <form class="game-bar" action="" method="POST">
                <input class="num-select" type="number" name="nr1" placeholder="Enter Number" max="20" min="0">
                <button id="try" type="submit" name="btn">TRY!</button>
                <button id="reset" type="submit" name="reset">RESET!</button>
            </form>
        </section>

       <section class="score">
        <div class="lose">
                <h1>Lose Numbers</h1>
                <?php 
                $sql_lose = $db->query("SELECT * FROM numbers WHERE results = 'lose'");
                while ($row = $sql_lose->fetch_assoc()) {
                    echo $row['numbers'].',';
                }
            ?>
            </div>

            <div class="win">
                <h1>Win Numbers</h1>
                <?php 
                $sql_win = $db->query("SELECT * FROM numbers WHERE results = 'win'");
                while ($row = $sql_win->fetch_assoc()) {
                    echo $row['numbers'].',';
                }
            ?>
            </div>
       </section>
        </section>
</body>
</html>