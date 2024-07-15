<!DOCTYPE html>
<html>
    
<head lang="en">
    <meta charset="UTF-8">

    <!--Page Title-->
    <title>Sign Up - User</title>

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
    <link href="css/register.css" rel="stylesheet">


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

<?php //include('header.php');
    require_once 'User.php';
    require_once 'database.php';

    $user = new User($conn);

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Call the register method to handle form submission
        $user->register();
    }

    ?>





    <div id="banner-content" class="row clearfix">
        <div class="formbox">
            <h1>Sign Up</h1>
            <form action="" method="post">
                <!-- <label for="name"><b>First Name</b></label> -->
                <input type="text" placeholder="Enter First Name" name="f-name" required>

                <!-- <label for="name"><b>Last Name</b></label> -->
                <input type="text" placeholder="Enter Last Name" name="l-name" required>

                <!-- <label for="username"><b>Username</b></label> -->
                <input type="text" placeholder="Enter Username" name="username" required>

                <!-- <label for="username"><b>Phone Number</b></label> -->
                <input type="number" placeholder="Enter Phone Number" name="phone" required>

                <!-- <label for="email"><b>Email</b></label> -->
                <input type="email" placeholder="Enter Email" name="email" required>

                <!-- <label for="address"><b>Address</b></label> -->
                <input type="text" placeholder="Enter Address" name="address" required>
        
                <!-- <label for="password"><b>Password</b></label> -->
                <input type="password" placeholder="Enter Password" name="password" required>
        
                <button class="reg" type="submit">Register</button>
            </form> 
        </div>
    </div>