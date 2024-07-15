<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
$id_session=$_SESSION['user_id'] ;

if (isset($_GET['id'])){
    $id=$_GET['id'];
}


// if (isset($_POST['cancel-check']))
//     header ('location: cart.php');

    require 'database.php';
//     // $order= new order($conn);
    

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">

    <!--Page Title-->
    <title>Invoice</title>

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


    <!--Google Webfonts-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
 <style>
    .invoice{
        text-align:center;
        padding: 50px 50px;
        background-color: white;
        margin: 50px 50px;
        /* height: 100px; */
    }
    .info {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin: 20px 30px;
    }
    .info .info-item {
        width: 48%; /* Set width to allow two items in a line with some spacing */
        margin-bottom: 10px; /* Add margin for spacing */
    }
    .info h4 {
        font-size: 20px;
        margin: 10px 10px;
        padding: 5px;
    }
    .artwork{
        background-color: #fff;
        border-radius: 5px;
        margin: 20px 50px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 15px;

    }
    .artwork img {
        max-width: 200px;
        height: auto;
        margin-right: 100px;
        border: 1px solid black;
    }

    .txt {
        margin-right: 100px;
        /* justify-content: center; */
        display: inline-block;
        /* margin: 20px 50px; */
    }

    .artwork h3 {
        font-size: 20px;
        /* font-weight: bold; */
    }

 </style>

<div class="page-border" data-wow-duration="0.7s" data-wow-delay="0.2s">
    <div class="top-border wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;"></div>
    <div class="right-border wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;"></div>
    <div class="bottom-border wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;"></div>
    <div class="left-border wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;"></div>
</div>
<?php //nclude 'header.php'; ?>

    <section class="mt-5 con">
        <div class="checkout-ccontainer">
            <div class="invoice">
                <h1>Invoice</h1>
                    <?php 
                  $select = "SELECT * FROM `orders` WHERE order_id='$id'";
                    $result = mysqli_query($conn, $select);
                 if(mysqli_num_rows($result)>0){
                   
                    while($row=mysqli_fetch_assoc($result)){
                    ?>
                    <div class="info">
                        <div class="info-item">
                            <h4>Username: <?php echo $row['username']; ?></h4>
                        </div>
                        <div class="info-item">
                            <h4>Email: <?php echo $row['email']; ?></h4>
                        </div>
                        <div class="info-item">
                            <h4>Phone: <?php echo $row['phone']; ?></h4>
                        </div>
                        <div class="info-item">
                            <h4>Billing Address: <?php echo $row['billing_address'];?></h4>
                        </div>
                        <div class="info-item">
                            <h4>Shipping Adress: <?php echo $row['shipping_address']; ?></h4>
                        </div>
                    </div>
                    <?php  
                        $art_total = $row['price'];
                        }} 
                        ?>
                
                    <?php 
                    $select = "SELECT * FROM `cart` where user_id='$id_session'";
                        $result = mysqli_query($conn, $select);
                    if(mysqli_num_rows($result)>0){
                    
                        while($fetch=mysqli_fetch_assoc($result)){
                     ?>
                     <div class="artwork">
                        <img src="images/products/<?php echo $fetch['image'] ?>" alt="" width="150">
                        <div>
                            <div class="txt">
                                <h3><?php echo $fetch['name']; ?></h3>
                            </div>
                            <div class="txt">
                            <h3>$<?php echo $fetch['price']; ?></h3>         
                            </div>
                        </div>
                    </div>
                    <?php  
                        }
                        } 
                        ?>
                        <h2>Total Price: $<?php echo $art_total; ?></h2>
                    
            </div>
        </div>
    </section>
    <?php 
    $stmt= mysqli_query($conn, "DELETE FROM `cart` where user_id='$id'");
    if ($stmt){}
    ?>
</body>
</html>