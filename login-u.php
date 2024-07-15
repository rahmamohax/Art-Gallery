<!DOCTYPE html>
<html>
    
<head lang="en">
    <meta charset="UTF-8">

    <!--Page Title-->
    <title>Login - User</title>

    <!--Meta Keywords and Description-->
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
    <script src="https://kit.fontawesome.com/9a37909410.js" crossorigin="anonymous"></script>

    <!--Favicon-->
    <link rel="shortcut icon" href="images/favicon.ico" title="Favicon"/>

    <!-- Main CSS Files -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Namari Color CSS -->
    <link rel="stylesheet" href="css/namari-color.css">

    <!--Icon Fonts - Font Awesome Icons-->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Animate CSS-->
    <link href="css/animate.css" rel="stylesheet" type="text/css">

    <link href="css/cart.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">


    <!--Google Webfonts-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
</head> 
<body>

<div class="page-border" data-wow-duration="0.7s" data-wow-delay="0.2s">
    <div class="top-border wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;"></div>
    <div class="right-border wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;"></div>
    <div class="bottom-border wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;"></div>
    <div class="left-border wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;"></div>
</div>

<?php
    //include_once('header.php');
    require_once 'User.php';
    require 'database.php';
    $user = new User($conn);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Call the register method to handle form submission
    if($user->login()){
        $_SESSION['user_id'] = $row['user_id']; // Assuming this is how you store the user ID
        header("location: index.php");
    }
}
?>





    <div id="banner-content" class="row clearfix">
        <img class="pic" src="images/dancer.jpg" width="300">
        <div class="formbox">
            <h1>Log in</h1>
            <form action="" method="post">
                <input type="text" placeholder="Enter Username" name="username" required>

                <input type="password" placeholder="Enter Password" name="password" required>
        
                <button class="login" type="submit">Login</button>
            </form> 
        </div>
    </div>
