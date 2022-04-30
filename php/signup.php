<?php
require_once "config.php";

$username = $password = $confirm_password = $email = "";
$username_err = $password_err = $confirm_password_err = $error = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
    }
    else{
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken"; 
                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }

    mysqli_stmt_close($stmt);
//check for email

if(empty(trim($_POST['email']))){
    $error = "Email cannot be empty";
} else {
    $email = trim($_POST['email']);
}

// Check for password
if(empty(trim($_POST['password']))){
    $password_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['password'])) < 5){
    $password_err = "Password cannot be less than 5 characters";
}
else{
    $password = trim($_POST['password']);
}

// Check for confirm password field
if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
    $password_err = "Passwords should match";
}


// If there were no errors, go ahead and insert into the database
if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($error))
{
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "sss", $param_username,  $param_email, $param_password);

        // Set these parameters
        $param_username = $username;
        $param_email = $email;
        $param_password = password_hash($password, PASSWORD_DEFAULT);

        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
            header("location: login.php");
        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="../css/gloabal.css">
    <link rel="stylesheet" href="../css/signup.css">
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
        <form method="POST" action="" class="form">
            <div class="form-item">
                <label for=""> Username </label>
                <input name="username" type="text" placeholder="Eg: ashley.cool63746">
            </div>

            <div class="form-item">
                <label for="">Email</label>
                <input name="email" type="email" placeholder="Eg: ashley@gmail.com">
            </div>

            <div class="form-item">
                <label for="">Password</label>
                <input name="password" type="password">
            </div>

            
            <div class="form-item">
                <label for="">Confirm Password</label>
                <input name="confirm_password" type="password">
            </div>
            <div class="form-item">
                <button class="button" >Sign-Up</button>
            </div>
        </form>
    </section>

</body>
</html>