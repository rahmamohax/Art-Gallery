<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
$id= isset($_SESSION['user_id'] );
include('connect.php');

if (isset($_GET['delete'])){
    $remove=$_GET['delete'];
    mysqli_query($conn, "DELETE FROM `cart` where name='$remove' and user_id= '$id'");
    // mysqli_query($conn, "UPDATE `products` set p_isactive='1' where p_name='$remove'");

}

if(isset($_SESSION['user_id'])){

?>



<!DOCTYPE html>
<html>
  
<head lang="en">
    <meta charset="UTF-8">

    <!--Page Title-->
    <title>Cart</title>

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

    <section class="mt-5">
        <div class="col-3">
            <div class="title">
                <h2>Cart</h2>
            </div>
        
            <?php  
                 $select=mysqli_query($conn, "SELECT * FROM `cart` where user_id='$id'");
                 $art_total= 0;
                 if(mysqli_num_rows($select)>0){
                    echo '<div class="cart-container">
                    <div class="cart">
                    <div class="table-responsive">
                        <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="text-white">Product</th>
                        <th scope="col" class="text-white">Name</th>
                        <th scope="col" class="text-white">Description</th>
                        <th scope="col" class="text-white">Price</th>
                        <th scope="col" class="text-white"></th>
                    </tr>
                </thead>
                <tbody>';

                while($fetch=mysqli_fetch_assoc($select)){
                    ?>
                <tr> 
                    <td>
                        <div class="d-flex">
                            <img src="images/products/<?php echo $fetch['image'] ?>"alt="" width="200">
                        </div>
                    </td>
                    <td>
                        <h6><?php echo  $fetch['name'] ?></h6>
                    </td>
                    <td>
                        <h6><?php echo  $fetch['description'] ?></h6>      
                    </td>
                    <td>
                        <h6>$<?php echo  $fetch['price'] ?></h6>
                    </td>
                    <td>
                        <a href="cart.php?delete=<?php echo $fetch['name']?>"
                        onclick="return confirm('Are you sure you want to delete this product?')">
                        <i class="fas fa-trash"></i></a>
                    </td>
                </tr> 
                <?php  
                $art_total =$art_total +  $fetch['price'];
                }
                 }
                    
                   ?>
                    
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </section>
    <div class="checkout-container">
        <div class="checkout">
            <ul>
                <li class="subtotal">Subtotal
                    <span>$<?php echo $art_total ?></span>
                </li>
                <?php 
                    if($art_total<500)
                        $fee =20.00;
                    else $fee= 0.00;
                    ?>
                <li class="subtotal">Shipping Fee
                    <span>$<?php echo $fee ;
                    $total= $fee + $art_total;?></span>
                </li>
                <li class="cart-total">Total
                <span>$<?php echo $total;  ?></span></li>
            </ul>
            <?php 
                if ($total<=20)
                    $page= 'cart.php';
                else $page= 'checkout.php';
            ?>
            <a href="<?php echo $page; ?>?checkout=<?php echo $total; ?>"class="proceed-btn">Proceed to Checkout</a>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<?php }
else{
    echo '<div style="display:block; text-align:center; padding-top: 250px;"><h1>You Must Login First</h1></div>';
}
?>
  </body>
  </html>