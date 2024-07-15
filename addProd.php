<?php 
 include('connect.php');
if (isset($_POST['add'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $des = $_POST['description'];

    // Check if file is uploaded successfully
    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $img = $_FILES['image']['name'];
        $img_temp = $_FILES['image']['tmp_name'];
        $img_folder = 'images/products/'.$img;

        // SQL query to insert data into database
        $insert = mysqli_query($conn, "INSERT INTO `products` (p_name, p_price, p_image, p_description, p_isactive) 
                VALUES ('$name', '$price', '$img', '$des', '1')") or die("data is not saved");

        if($insert){
            // Move uploaded file to the desired location
            move_uploaded_file($img_temp, $img_folder);
            echo "Data Saved Successfully";
        } else {
            echo "Error";
        }
    } else {
        echo "No image uploaded";
    }
}


?>
<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">

    <!--Page Title-->
    <title>Add Artwork</title>

    

    <!-- <link href="css/cart.css" rel="stylesheet"> -->
    <script src="script.js"></script>


    <!--Google Webfonts-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
</head> 
<body>
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
</style>
    <div class="container">
        <section>
            <h3 class="heading">Add Artwork</h3>
            <form action="" method="post" class="add" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" name="name" id="" class="input_fields" placeholder="Artwork Name" required>
            </div>
            <div class="form-group">
                <input type="text" name="description" id="" class="input_fields" placeholder="Artwork Description" required>

            </div>
            <div class="form-group">
                <input type="number" min="0" name="price" id="" class="input_fields" placeholder="Artwork price" required>

            </div>
            <div class="form-group">
                <input type="file" name="image" id="" class="input_fields" required accept="image/png, image/jpg, image/jpeg">

            </div>
            <!-- <div class="form-group">

            </div> -->
                <input type="submit" name="add" id="" class="submit_btn" value="add Artwork">
            </form>

        </section>
    </div>
</body>
