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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container {
            max-width: 700px;
            margin: 150px auto;
            background-color: #fff;
            padding: 20px 50px;
            /* border-radius: 10px; */
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2::after{
            content: '';
            width: 100px;
            height: 4px;
            position: absolute;
            background: #d2b356;
            top: 33%;
            left: 50%;
            transform: translateX(-50%);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="email"], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }
        textarea {
            height: 100px;
        }
        input[type="submit"] {
            background-color: white;
            cursor: pointer;
            border-style: solid;
            border-width: 3px;
            padding: 0px 20px;
        }
        input[type="submit"]:hover {
            border-color: #d2b356;
            font: #d2b356;
        }
    </style>
</head>
<body>
    <section>
        <div class="container">
        <h2>Send an E-Gift</h2>
        <form action="send_egift.php" method="POST">
            <div class="form-group">
                <label for="sender_name">Your Name:</label>
                <input type="text" id="sender_name" name="sender_name" required>
            </div>
            <div class="form-group">
                <label for="sender_email">Your Email:</label>
                <input type="email" id="sender_email" name="sender_email" required>
            </div>
            <div class="form-group">
                <label for="recipient_name">Recipient's Name:</label>
                <input type="text" id="recipient_name" name="recipient_name" required>
            </div>
            <div class="form-group">
                <label for="recipient_email">Recipient's Email:</label>
                <input type="email" id="recipient_email" name="recipient_email" required>
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea>
            </div>
            <input type="submit" value="Send E-Gift">
        </form>
    </div>
    </section>
    
</body>
</html>
