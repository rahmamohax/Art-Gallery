<?php
error_reporting(E_ERROR | E_PARSE);

session_start();
$id_session=$_SESSION['user_id'] ;
require 'User.php';
include 'connect.php';
require 'order.php';
if (isset($_GET['checkout']))
    $total=$_GET['checkout'];

if (isset($_POST['cancel-check']))
    header ('location: cart.php');

   
    $order= new order($conn);
    
if (isset($_POST['order'])){
    // $order->placeOrder();
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $pin_code = $_POST["pin-code"];
    $b_address = $_POST["b-address"];
    $s_address = $_POST["s-address"];

    $select_query = "SELECT * FROM `cart` WHERE user_id = '$id_session'";

    $result = mysqli_query($conn, $select_query);

    // Check if there are any rows returned
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $name=$row['name'];
            $update= "UPDATE `products` SET p_isactive='0' WHERE p_name='$name'";
            if ($conn->query($update) === TRUE) {
        }
    }

    $stmt= "INSERT INTO `orders` (username, email, phone, pin, price, billing_address, shipping_address) 
         values ('$username', '$email', '$phone', '$pin_code', '$total', '$b_address', '$s_address' )";
         if ($conn->query($stmt) === TRUE) {
            // Retrieve the ID of the last inserted row
            $last_id = $conn->insert_id;
            echo "New record created successfully. Last inserted ID is: " . $last_id;
            header("Location: invoice.php?id=$last_id");
            exit;
         }
        }
    }
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">

    <!--Page Title-->
    <title>Checkout</title>

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



<div class="page-border" data-wow-duration="0.7s" data-wow-delay="0.2s">
    <div class="top-border wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;"></div>
    <div class="right-border wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;"></div>
    <div class="bottom-border wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;"></div>
    <div class="left-border wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;"></div>
</div>
<?php include 'header.php'; ?>

    <section class="mt-5 con">
            <div class="checkout-ccontainer">
                <div class="check-container">
                    <h1>Checkout</h1>
                    <form action="" method="post">
                        <div class="input">
                            <input type="text" name="username" id="name" placeholder="Enter your username" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>">
                        </div>
                        <div class="input">
                            <input type="email" name="email" id="email" placeholder="Enter your email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>">
                        </div> 
                        <div class="input">
                            <input type="number" name="phone" id="phonee" placeholder="Enter your phone number" value="<?php echo isset($_SESSION['Phone']) ? $_SESSION['Phone'] : ''; ?>">
                        </div>
                        <div class="input">
                            <input type="number" name="pin-code" id="pin-code" placeholder="Enter your pin code" value="<?php echo isset($_SESSION['Phone']) ? $_SESSION['Phone'] : ''; ?>">
                        </div> 
                        <div class="input">
                            <textarea id="b-address" name="b-address" placeholder="Enter your Billing Adress here.."><?php echo isset($_SESSION['address']) ? $_SESSION['address'] : ''; ?></textarea>  
                        </div>                     
                        <div class="input">
                            <textarea id="s-address" name="s-address" placeholder="Type your Shipping Adress here.."><?php echo $_SESSION['address']; ?></textarea>
                        </div> 
                        <h2>Payment Options</h2>                           
                        <div class="pay">
                            <input type="radio" id="card" name="payment_method" value="credit_card">
                            <label for="credit_card">Credit Card</label>
                        </div>
                        <div id="myForm" style="display: none;">
                            <!-- Credit card fields here -->
                        <div class="card-s space icon-relative">
                        <i class="fas fa-user"></i>
                        <input type="text" class="input" placeholder="Coding Market">
                    </div>
                    <div class="card-s  icon-relative">
                        <i class="far fa-credit-card"></i>
                        <input type="text" class="input" data-mask="0000 0000 0000 0000" placeholder="Card Number">
                        
                    </div>
                    <div class="card-g space">
                        <div class="card icon-relative">
                            <i class="far fa-calendar-alt"></i>
                        <input type="text" name="expiry-data" class="input"  placeholder="00 / 00">
                        
                        </div>
                        <div class="card icon-relative">
                            <i class="fas fa-lock"></i>
                        <input type="text" class="input" data-mask="000" placeholder="000">
                        </div>
                    </div>
                        </div>
                        <div class="pay">
                            <input type="radio" id="cashr" name="payment_method" value="cash">
                            <label for="cash">Cash On Delivery</label>
                        </div>
                        <h2>Total Price: $<?php echo $total; ?></h2>
                        <div class="buttonn"><button class="check-btn" name="cancel-check" type="submit">Cancel</button></div>
                        <div class="buttonn"><a href="invoice.php?id=<?php echo $last_id; ?>"><button class="check-btn" name="order" type="submit">Place Order</button></a></div>
                        
                    </form> 

            </div>
        </div>
    </section>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
    
</body>
</html>

<script>
    document.getElementById("card").addEventListener("change", function() {
        var form = document.getElementById("myForm");
        if (this.checked) {
            form.style.display = "block";
        } else {
            form.style.display = "none";
        }
    });

    document.getElementById("order").addEventListener("click", function() {
        // Add 'required' attribute to the input when the button is clicked
        document.getElementById("name").setAttribute("required", "required");
        document.getElementById("email").setAttribute("required", "required");
        document.getElementById("phone").setAttribute("required", "required");
        document.getElementById("bin-code").setAttribute("required", "required");
        document.getElementById("b-address").setAttribute("required", "required");
        document.getElementById("s-address").setAttribute("required", "required");

    });

    $("input[name='expiry-data']").mask("00 / 00");
</script>
