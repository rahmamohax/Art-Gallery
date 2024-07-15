<?php include 'header.php';?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">

    <!--Page Title-->
    <title>Update Information</title>

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
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>



<div class="page-border" data-wow-duration="0.7s" data-wow-delay="0.2s">
    <div class="top-border wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;"></div>
    <div class="right-border wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;"></div>
    <div class="bottom-border wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;"></div>
    <div class="left-border wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;"></div>
</div>
<?php //include 'header.php';
require_once 'User.php';
require_once 'database.php';
$user = new User($conn);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user->update_info();
}
?>

    <section class="mt-5 con">
        <h2 class=contact>Update Information</h2>
            <div class="ccontainer">
                <div class="update-container">
                    <form action="update_info.php" method="post">
                        <label  class='label' for="new-username">New Username:</label>
                        <input type="text" name="new_username" id="new-username" required pattern="[a-zA-Z0-9]+" title="Username can only contain letters and numbers">
                        <br><br>

                        <label class='label' for="new-password">New Password:</label><br><br>
                        <input type="password" name="new_password" id="new-password" required pattern="^\S+$" title="Password cannot contain spaces"><br><br>

                        <button type="submit">Update</button>
                    </form> 
            </div>
        </div>

</body>
</html>