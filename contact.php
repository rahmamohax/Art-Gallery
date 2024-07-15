<?php
require_once 'User.php';
require_once 'database.php';

$user = new User($conn);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user->contact();
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">

    <!--Page Title-->
    <title>Contact Advisor</title>

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

<?php include 'header.php'; ?>
    <section class="mt-5 con">
    <h2 class=contact>Contact Advisor</h2>
    <div class="ccontainer">
        <div class="contact-container">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label class='label' for="subject">Subject:</label>
                <input type="text" id="subject" name="subject" required><br><br>

                <label class='label' for="message">Message:</label><br><br>
                <textarea id="message" name="message" rows="4" cols="50" placeholder='Type your message here..' required></textarea><br><br>   

                <button type="submit" name="submit" >Send</button>
            </form>
        </div>
    </div>
    </section>
</body>
</html>