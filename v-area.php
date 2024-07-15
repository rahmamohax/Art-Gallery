<!DOCTYPE html>
<html>
    
<head lang="en">
    <meta charset="UTF-8">

    <!--Page Title-->
    <title>Virtual Area</title>

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
    <!-- <link href="css/register.css" rel="stylesheet"> -->


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

<style>
    .area{
    text-align: center;
    margin:150px 50px;
}
.area h1{
    font-weight: bold;
}
.block{
    display: inline-block;
    margin: 40px 100px;
    padding: 0 100px;
    border: 5px solid black;
}
.block img{
    padding-bottom: 20px;
}
.img-wrapper {
    display: flex;
    flex-direction: column;
    align-items: center;
}
.img-wrapper a{
    font-size: 25px;
    color: #111010;
    padding-bottom: 20px;
}
</style>

    <?php include('header.php') ?>





    <div id="banner-content" class="area">
        <div class="block">
            <h1>Virtual Room</h1>
            <div class="img-wrapper">
                <img src="images/gallery-images/gallery-image-1.jpg" width=250 alt="">
                <a href="">V-room</a>
            </div>
        </div>
        <div class="block">
            <h1>Virtual Wall</h1>
            <div class="img-wrapper">
                <img src="images/gallery-images/gallery-image-5.jpg" width=250 alt="">
                <a href="v-wall.php">V-wall</a>
            </div>
        </div>
        <div class="block">
            <h1>Virtual Gallery</h1>
            <div class="img-wrapper">
                <img src="images/gallery-images/gallery-image-3.jpg" width=250 alt="">
                <a href="">V-Gallery</a>
            </div>
        </div>
    </div>