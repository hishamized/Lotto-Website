<?php 
    include 'templates/navbar.php';
    include 'php/config.php';
    $sql = "SELECT id, username, email, password FROM users";
    $result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["username"]. " " . $row["email"]. " " .$row["password"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lotto</title>
    <link rel="stylesheet" href="./css/gloabal.css">
</head>
<body>

</body>
</html>