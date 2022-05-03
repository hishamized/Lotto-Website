<?php 
    include "templates/navbar.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game time</title>
    <link rel="stylesheet" href="css/gloabal.css">
    <style>
        .game-container{
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            margin: 2rem;
            justify-content: center;
            align-items: center;
            gap: 4rem;
        }
        .game {
            font-family: Arial, Helvetica, sans-serif;
            color: white;
            font-weight: bold;
            padding: 2rem;
        }
        .game1, .game2, .game3, .game4, .game5 {
            display: none;
            flex-direction: column;
        }
        .game1 {
            background-color: red;
            box-shadow: 4px 4px 15px 15px red;
        }
        .game2{
            background-color: yellow;
            box-shadow: 4px 4px 15px 15px yellow;
            color: gray;
        }
        .game3{
            background-color: green;
            box-shadow: 4px 4px 15px 15px green;
        }
        .game4{
            background-color: purple;
            box-shadow: 4px 4px 15px 15px purple;
        }
        .game5{
            background-color: purple;
            box-shadow: 4px 4px 15px 15px purple;
        }
        .digital {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 5%;
            font-family: Arial, Helvetica, sans-serif;
            background-color: black;
            color: aliceblue;
            font-size: 2vw;
            padding: 2%;
        }

            #digital {
                background-color: white;
                color: black;
                border: 2px double red;
                padding: 1%;
            }
            #digital:hover {
                transition: 0.5s;
                transform: scale(1.1);
                box-shadow: 1px 1px 5px 1px aqua;
            }
            #message {
                display: flex;
                text-align: center;
                justify-content: center;
                background-color: red;
                color: white;
                font-weight: bold;
                padding: 1rem;
                border-radius: 4px;
                font-family: Arial, Helvetica, sans-serif;
                margin: 4rem;
            }
    </style>
</head>
<body>
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

   
   

    <script>
        var today = new Date();
        var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        var dateTime = date+' '+time;

         var time_value = today.getHours()
         var type = typeof(time_value);
         document.getElementById("digital").innerHTML = dateTime;
         
         
         if(time_value >= 7 && time_value <= 10){
             const game1 = document.getElementById("game1");
             game1.style.display = "flex";
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
         if(time_value >= 11 && time_value <= 13){
             const game2 = document.getElementById("game2");
             game2.style.display = "flex";
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
         if(time_value >=14  && time_value <= 16){
             const game3 = document.getElementById("game3");
             game3.style.display = "flex";
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
         if(time_value >=17  && time_value <= 19){
             const game4 = document.getElementById("game4");
             game4.style.display = "flex";
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
         if(time_value >=20  && time_value <= 22){
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