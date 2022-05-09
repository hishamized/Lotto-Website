<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
         $loop;
         for($loop = 1; $loop <= 25; $loop = $loop + 1){
             echo " <button  id='cell$loop' class=\"cell\"> $loop 
             </button>";
         }
        //  onClick=\"getID()\"
       ?> 

<script>
    var buttons = document.getElementsByTagName("button");
    var buttonsCount = buttons.length;
    for (var i = 0; i <= buttonsCount; i += 1) {
    buttons[i].onclick = function(e) {
        alert(this.id);
    };
}
</script>
</body>
</html>