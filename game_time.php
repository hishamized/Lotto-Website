<?php 
    include "templates/navbar.php";
    include "php/config.php";
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
      header("location: php/login.php");
      exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game time</title>
    <link rel="stylesheet" href="css/gloabal.css">
    <link rel="stylesheet" href="css/game1.css">
   <link rel="stylesheet" href="css/game_time.css">
</head>
<body>
    <section class="test-game-container">
        <h3>Select any random box and try your luck!</h3>
    <div class="test-game">
        <?php 
         $loop;
         for($loop = 1; $loop <= 25; $loop = $loop + 1){
             echo " <button  id='$loop' class=\"cell\" onclick=\"getBtnId(this)\"> $loop 
             </button>";
         }
        //  onClick=\"getID()\"
       ?> 
    </div> 
    </section>
    <section class="game1-container">
        <h1>SELECT A RANDOM NUMBER AND TRY YOUR LUCK</h1>
        <section class="game1-container">
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
    <section class="game-container">
        <div id="game1" class="game game1">
            <h3>Game 1</h3>
            <p>Write game code here...</p>
            <div>Game Closes In  <span class="two_hours" id="time1">Time Left</span></div>
        </div>
        <div id="game2" class="game game2">
            <h3>Game 2</h3>
            <p>Write game code here...</p>
            <div>Game Closes In  <span class="two_hours" id="time2">Time Left</span></div>
        </div>
        <div id="game3" class="game game3">
            <h3>Game 3</h3>
            <p>Write game code here...</p>
            <div>Game Closes In  <span class="two_hours" id="time3">Time Left</span></div>
        </div>
        <div id="game4" class="game game4">
            <h3>Game 4</h3>
            <p>Write game code here...</p>
            <div>Game Closes In  <span class="two_hours" id="time4">Time Left</span></div>
        </div>
        <div id="game5" class="game game5">
            <h3>Game 5</h3>
            <p>Write game code here...</p>
            <div>Game Closes In  <span class="two_hours" id="time5">Time Left</span></div>
        </div>
    </section>
    <div id="message">No games available at this time. Please come back later.</div>
    <div class="digital">
      <h3 id="digital">

      </h3>
   </div>
   
<!-- Script for Random 25 box game starts -->
<script>
      let idNum;
      let credit = 0;
      let win = false;
      let randomArray = new Array();
        for(let i=0; i<10; i++){
            randomArray[i] = Math.floor(Math.random()*25);
        }
        function getBtnId(e) {
            const btn = e;
            e.style.backgroundColor = "green"
            console.log(btn.id);
            idNum = parseInt(btn.id);
            for(let j=0; j<10 ; j++){
            if(randomArray[j] == idNum){
                alert("You Won! 5$ have been credited to your account");
                win = true;
                credit = credit + 5;
                // window.location.reload();
                //AJAX 
                const xhttp = new XMLHttpRequest();
                xhttp.onload = function() {
                    document.getElementById(btn.id).innerHTML = this.responseText;
                }
                xhttp.open("GET", "php/credit.php");
                xhttp.send();
            } 
         }
         if(win == false){
             alert("You did not win. Click 'Ok' to Try again.");
             window.location.reload();
         }
        }
       
      </script>
<!-- Script for Random 25 box game ends -->

   
   

    <script>
        var today = new Date();
        var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        var dateTime = date+' '+time;

         var time_value = today.getHours()
         var type = typeof(time_value);
         document.getElementById("digital").innerHTML = dateTime;
         
         
         if(time_value >= 7 && time_value < 9){
             const game1 = document.getElementById("game1");
             game1.style.display = "flex";
             const message = document.getElementById("message");
             message.style.display = "none";

             var hours_now = today.getHours();
             var minutes_now = today.getMinutes();
             var seconds_now = today.getSeconds();

             var hours_left = 9 - hours_now -1;
             var minutes_left = (60 - minutes_now) + (hours_left*60);
             var seconds_left = (60 - seconds_now) + minutes_left*60 ;

             function startTimer(duration, display) {
            var timer = duration, hours, minutes, seconds;
            setInterval(function () {
                hours = parseInt( (timer)/3600, 10);
                //Separates the hours from minutes and returns the remaining minutes
                minutes = parseInt((timer / 60)%60, 10); 
                seconds = parseInt(timer % 60, 10);

                hours = hours < 10 ? "0" + hours : hours;
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = hours + ":" + minutes + ":" + seconds;

                if (--timer < 0) {
                    timer = duration;
                }
            }, 1000);
        }

            window.onload = function () {
                var countDownTIme = seconds_left,
                    display = document.querySelector("#time1");
                startTimer(countDownTIme, display);
            };
         }
         if(time_value >= 11 && time_value < 13){
             const game2 = document.getElementById("game2");
             game2.style.display = "flex";
             const message = document.getElementById("message");
             message.style.display = "none";

             var hours_now = today.getHours();
             var minutes_now = today.getMinutes();
             var seconds_now = today.getSeconds();

             var hours_left = 13 - hours_now -1;
             var minutes_left = (60 - minutes_now) + (hours_left*60);
             var seconds_left = (60 - seconds_now) + minutes_left*60 ;

             function startTimer(duration, display) {
            var timer = duration, hours, minutes, seconds;
            setInterval(function () {
                hours = parseInt( (timer)/3600, 10);
                //Separates the hours from minutes and returns the remaining minutes
                minutes = parseInt((timer / 60)%60, 10); 
                seconds = parseInt(timer % 60, 10);

                hours = hours < 10 ? "0" + hours : hours;
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = hours + ":" + minutes + ":" + seconds;

                if (--timer < 0) {
                    timer = duration;
                }
            }, 1000);
        }

            window.onload = function () {
                var countDownTIme = seconds_left,
                    display = document.querySelector("#time2");
                startTimer(countDownTIme, display);
            };
         }
         if(time_value >=14  && time_value <16){
             const game3 = document.getElementById("game3");
             game3.style.display = "flex";
             const message = document.getElementById("message");
             message.style.display = "none";

             var hours_now = today.getHours();
             var minutes_now = today.getMinutes();
             var seconds_now = today.getSeconds();

             var hours_left = 16 - hours_now -1;
             var minutes_left = (60 - minutes_now) + (hours_left*60);
             var seconds_left = (60 - seconds_now) + minutes_left*60 ;

             function startTimer(duration, display) {
            var timer = duration, hours, minutes, seconds;
            setInterval(function () {
                hours = parseInt( (timer)/3600, 10);
                //Separates the hours from minutes and returns the remaining minutes
                minutes = parseInt((timer / 60)%60, 10); 
                seconds = parseInt(timer % 60, 10);

                hours = hours < 10 ? "0" + hours : hours;
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = hours + ":" + minutes + ":" + seconds;

                if (--timer < 0) {
                    timer = duration;
                }
            }, 1000);
        }

            window.onload = function () {
                var countDownTIme = seconds_left,
                    display = document.querySelector("#time3");
                startTimer(countDownTIme, display);
            };
         }
         if(time_value >=17  && time_value < 19){
             const game4 = document.getElementById("game4");
             game4.style.display = "flex";
             const message = document.getElementById("message");
             message.style.display = "none";
             var hours_now = today.getHours();
             var minutes_now = today.getMinutes();
             var seconds_now = today.getSeconds();

             var hours_left = 19 - hours_now -1;
             var minutes_left = (60 - minutes_now) + (hours_left*60);
             var seconds_left = (60 - seconds_now) + minutes_left*60 ;

             function startTimer(duration, display) {
            var timer = duration, hours, minutes, seconds;
            setInterval(function () {
                hours = parseInt( (timer)/3600, 10);
                //Separates the hours from minutes and returns the remaining minutes
                minutes = parseInt((timer / 60)%60, 10); 
                seconds = parseInt(timer % 60, 10);

                hours = hours < 10 ? "0" + hours : hours;
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = hours + ":" + minutes + ":" + seconds;

                if (--timer < 0) {
                    timer = duration;
                }
            }, 1000);
        }

            window.onload = function () {
                var countDownTIme = seconds_left,
                    display = document.querySelector("#time4");
                startTimer(countDownTIme, display);
            };
         }
         if(time_value >=20  && time_value < 22){
             const game5 = document.getElementById("game5");
             game5.style.display = "flex";
             const message = document.getElementById("message");
             message.style.display = "none";


             var hours_now = today.getHours();
             var minutes_now = today.getMinutes();
             var seconds_now = today.getSeconds();

             var hours_left = 22 - hours_now -1;
             var minutes_left = (60 - minutes_now) + (hours_left*60);
             var seconds_left = (60 - seconds_now) + minutes_left*60 ;

             function startTimer(duration, display) {
            var timer = duration, hours, minutes, seconds;
            setInterval(function () {
                hours = parseInt( (timer)/3600, 10);
                //Separates the hours from minutes and returns the remaining minutes
                minutes = parseInt((timer / 60)%60, 10); 
                seconds = parseInt(timer % 60, 10);

                hours = hours < 10 ? "0" + hours : hours;
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = hours + ":" + minutes + ":" + seconds;

                if (--timer < 0) {
                    timer = duration;
                }
            }, 1000);
        }

            window.onload = function () {
                var countDownTIme = seconds_left,
                    display = document.querySelector("#time5");
                startTimer(countDownTIme, display);
            };
         }
    </script>
</body>
</html>