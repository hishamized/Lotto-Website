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
            display: flex;
            flex-direction: row;
            margin: 2rem;
            justify-content: space-between;
            align-items: center;
        }
        .game {
            display: flex;
            flex-direction: column;
            font-family: Arial, Helvetica, sans-serif;
            color: white;
            font-weight: bold;
            padding: 2rem;
        }
        .game1, .game2, .game3 {
            display: flex;
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
    </style>
</head>
<body>
    <section class="game-container">
        <div id="game1" class="game game1">
            <h3>Game 1</h3>
            <p>Write game code here...</p>
        </div>
        <div id="game2" class="game game2">
            <h3>Game 2</h3>
            <p>Write game code here...</p>
        </div>
        <div id="game3" class="game game3">
            <h3>Game 3</h3>
            <p>Write game code here...</p>
        </div>
    </section>
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
         
         
         if(time_value >= 0 && time_value <= 8){
             const game1 = document.getElementById("game1");
             game1.style.display = "none";
             const game2 = document.getElementById("game2");
             game2.style.display = "none";
         }
         if(time_value >= 9 && time_value <= 16){
             const game1 = document.getElementById("game1");
             game1.style.display = "none";
             const game3 = document.getElementById("game3");
             game3.style.display = "none";
         }
         if(time_value >= 17 && time_value <= 24){
             const game2 = document.getElementById("game2");
             game2.style.display = "none";
             const game3 = document.getElementById("game3");
             game3.style.display = "none";
         }
    </script>
</body>
</html>