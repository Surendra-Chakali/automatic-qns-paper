<?php
session_start();
error_reporting(0);
include('db_connection.php');
if (isset($_POST['login'])) {
    # code...
    // $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = mysqli_query($conn, "SELECT * FROM admintable WHERE username = '$username'");
    $res = mysqli_fetch_assoc($sql);
    $usernum = $res['username'];
    $pass = $res['password'];

    if ($usernum == $username && $pass == $password) {
        # code...
        $_SESSION['username'] = $usernum;
        header('location:questions.php');
    }
    else{
        echo "<script>alert('User credentials are wrong :)');</script>";
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/sritlogo.png" type="image/x-icon">
    <script
    src="https://kit.fontawesome.com/64d58efce2.js"
    crossorigin="anonymous"
   ></script>
    <link rel="stylesheet" href="styles.css"/>
    <title>Registration</title>
</head>
<body>
   <div class="container">
       <div class="forms-container">
        <div class="signin-signup">

           <form action="" class="sign-in-form" method="post">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
             <i class="fas fa-user"></i>
             <input type="text" placeholder="Username" name="username" required>
            </div>
            <div class="input-field">
             <i class="fas fa-lock"></i>
             <input type="password" placeholder="Password" name="password" required/>
            </div>
            <input type="submit" class="btn" value="Login" name="login">
            </form>

        </div>
       </div>
       <div class="panels-container">
        <div class="panel left-panel">
            
            <img src="img/bg1.png" alt="" class="image">
        </div>

        <div class="panel right-panel">
            <div class="content">
                <h3>One of us</h3>
                <p>Lets get into</p>
                <button class="btn transparent" id="sign-in-button">Sign In</button>
            </div>
            <img src="img/images-4.jpeg" alt="" class="image">
        </div>
       </div>
   </div>
 <script src="app.js"></script>   
</body>
</html>