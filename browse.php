<?php 
error_reporting(E_ERROR | E_PARSE);

include('connect.php');
include 'user.php';
session_start();
$id_u= $_SESSION['user_id'];
// echo $id;
if (isset($_POST['add'])){
    $id = $_POST['id'];
    $name=$_POST['name'];
    $price = $_POST['price'];
    $des=$_POST['des'];  
    $img = $_POST['image'];
    // mysqli_query($conn, "UPDATE `products` set p_isactive='0' where p_name='$name'");
    
        $select= mysqli_query($conn, "SELECT * FROM `cart` where name='$name'AND user_id='$id_u'");
        if(mysqli_num_rows($select)> 0){
            echo 'product is in cart';
        }else{
            $insert = mysqli_query($conn, "INSERT INTO `cart` (name, price, image, description, isactive, user_id) 
                VALUES ('$name', '$price', '$img', '$des', '0', '$id_u')") or die("data is not saved");
        }
       
    }
?>


<!DOCTYPE html>
<html>

<style>
    /* Disable the submit button */
    .disabled-submit {
        pointer-events: none;
        cursor: not-allowed;
        opacity: 0.5; /* Optionally, reduce opacity to indicate it's disabled */
    }
</style>


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

<div class="page-border" data-wow-duration="0.7s" data-wow-delay="0.2s">
    <div class="top-border wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;"></div>
    <div class="right-border wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;"></div>
    <div class="bottom-border wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;"></div>
    <div class="left-border wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;"></div>
</div>

    <?php include('header.php') ?>
            <div class="container">
        <?php
            include 'connect.php'; 
            $display=mysqli_query($conn, "SELECT * FROM `products`");
            if(mysqli_num_rows($display)>0){
                while( $row=mysqli_fetch_assoc($display)){
                ?>
                <!-- <div id="banner-content" class="row clearfix"> -->
                <div class="product_cont">

                <form action="" method="post">
                    <div class="edit_form">
                        <div class="image-cont ainer">
                        <img src="images/products/<?php echo $row['p_image']?>"class=photo alt="">
                        </div>
                        <h3><?php echo $row['p_name']?></h3>
                        <div class="price">Price: <?php echo $row['p_price']?></div>
                            <input type="hidden" name="id" value="">
                            <input type="hidden" name="name" value="<?php echo $row['p_name']?>">
                            <input type="hidden" name="price" value="<?php echo $row['p_price']?>">
                            <input type="hidden" name="image" value="<?php echo $row['p_image']?>">
                            <input type="hidden" name="des" value="<?php echo $row['p_description']?>">
                            <?php if ($row['p_isactive']==0){
                                echo '<div >Out of Stock</div>';
                                ?>
                                <input type="submit" name="add" value="Add to Cart" class="disabled-submit">
                            <?php
                            }else{?>
                                <input type="submit" name="add" value="Add to Cart">
                                <?php }?>
                            
                    </div>
                    </form>
                </div>
            <?php
            }}else "<div class='empty'>Start Adding Products</div>";?>
        </div>
    </div>
</body>
</html>