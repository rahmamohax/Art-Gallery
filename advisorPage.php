<?php 
require 'advisor.php';
require 'database.php';

$advisor = new Advisor($conn);

// Check if the advisor is already logged in
session_start();
if (isset($_SESSION['advisor_id'])) {
    // Display messages if the advisor is logged in
    // $advisor->displayMsg();

    // Handle contact form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $advisor->contact();
    }
} else {
    // If not logged in, process login form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Attempt login
        $advisor->login();
        // $advisor->displayMsg();
    }
}

?>



<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">

    <!--Page Title-->
    <title>Advisor</title>

    <!--Meta Keywords and Description-->
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
    <script src="https://kit.fontawesome.com/9a37909410.js" crossorigin="anonymous"></script>


    <!--Favicon-->

</head>
<body>

<style>
    .ccontainer {
        /* display: flex; */
        justify-content: center;
        align-items: center;
        height: 100vh;
    } 

    .contact-container {
        background-color: #f0f0f0;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .banner-content {
        margin-top: 20px;
    }

    .login-form {
        display: flex;
        flex-direction: column;
    }

    .login-form input {
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 100%;
    }

     .login-form button {
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .login-form button:hover {
        background-color: #45a049;
    }
    #message-container {
        background-color: #f0f0f0;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin: 50px 200px;
    }

    .message {
        /* text-align: center; */
        margin-bottom: 10px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #fff;
    }

    .message h3 {
        margin-top: 0;
    }
    #reply-form {
        text-align: center;
        background-color: #f0f0f0;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin: 50px 100px;
    }

    #reply-form label {
        display: block;
        margin-bottom: 5px;
        /* font-weight: bold; */
    }

    #reply-form input[type="text"],
    #reply-form textarea {
        width: 80%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    #reply-form button[type="submit"] {
        padding: 10px 20px;
        background-color: white;
        border: 2px solid black;
        border-radius: 5px;
        cursor: pointer;
    }

</style>

<div class="page-border" data-wow-duration="0.7s" data-wow-delay="0.2s">
    <div class="top-border wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;"></div>
    <div class="right-border wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;"></div>
    <div class="bottom-border wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;"></div>
    <div class="left-border wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;"></div>
</div>
<body>

<?php //include 'header.php'; ?>

    <div class="ccontainer">
            <h1>Advisor Home Page</h1>
            <div id="banner-content" class="row container">
                <div class="contact-container ">
                    <?php if (!isset($_SESSION['advisor_id'])) : ?>
                        <!-- Display login form if advisor is not logged in -->
                        <h1>Log in</h1>
                        <form action="advisorPage.php" method="post" style="">
                            <input type="text" placeholder="Enter Username" name="username" required>
                            <input type="password" placeholder="Enter Password" name="password" required>
                            <button class="login" type="submit">Login</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
    </div>

    <!-- Reply to User form -->
    <?php if (isset($_SESSION['advisor_id'])) : ?>
        <div id="message-container">
        <?php
        // Include the User class and database connection
        require_once 'User.php';
        require_once 'database.php';

        // Create a new instance of the User class
        $user = new User($conn);

        // Call the displayMsg() method and output the messages within the container
        echo $advisor->displayMsg();
        ?>
        </div>
        <h1>Reply to User</h1>
        <div id="reply-form" class="formbox">
            <form action="advisorPage.php" method="post">
                <label for="username">User's Username:</label>
                <input type="text" name="username" required><br>
                <label for="subject">Subject:</label><br>
                <input type="text" name="subject" required><br>
                <label for="message">Message:</label><br>
                <textarea name="message" rows="4" cols="50" required></textarea><br>
                <button type="submit" name="submit">Send Reply</button>
            </form>
        </div>
    <?php endif; ?>
 
</body>
</html>
