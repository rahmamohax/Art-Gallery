<?php 
error_reporting(E_ERROR | E_PARSE);
session_start();
$id_u= $_SESSION['artist_id'];
// echo $id;
require_once 'User.php';
    require 'database.php';
    $user = new User($conn);

if (isset($_POST['logout'])){
    $user->logout();
}
if (isset($_POST['Add'])){
    header('location:addProd.php'); 
}
if (isset($_POST['Edit'])){
    header('location:viewProd.php');
}
?>


<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">

    <!--Page Title-->
    <title>Prowse Art</title>

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
    <script src="script.js"></script>
    <script src="https://kit.fontawesome.com/9a37909410.js" crossorigin="anonymous"></script>



    <!--Google Webfonts-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
</head> 
<body>
<style>
    .buttonn{
        display:inline;
    }
    .btn{
    margin: 150px 50px;
    background-color: rgb(255, 255, 255);
    font-family: 'Open Sans', sans-serif, Arial, Helvetica;
    font-size: 15px;
    font-weight: bold;
    /* text-align: center; */
    border: 3px solid;
    transition: all .3s linear;
    cursor: pointer;
}
</style>

<div class="page-border" data-wow-duration="0.7s" data-wow-delay="0.2s">
    <div class="top-border wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;"></div>
    <div class="right-border wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;"></div>
    <div class="bottom-border wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;"></div>
    <div class="left-border wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;"></div>
</div>

    <?php include('header.php') ?>

    <section>

        <form class='buttonn' method="post" action="">
        <?php if (isset($_SESSION['artist_id'])){?>
            <button class='btn' type="submit" name="Add">Add Products</button>

            <button class='btn' type="submit" name="Edit">Edit Products</button>

            <?php }?>
            <button class='btn' type="submit" name="logout">Log Out</button>
        </form>    
    </section>
</body>
</html>