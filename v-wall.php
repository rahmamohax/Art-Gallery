<?php
include 'database.php';
include 'User.php';

// Usage: Assuming $conn is the database connection object
$user = new User($conn);
$user->viewWall();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Wall View</title>
    <style>
        .wall {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
        }
        .image-container {
            width: 200px;
            height: auto;
            margin: 10px;
        }
        .image-container img {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <h2>Wall View</h2>
    <form action="" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
    </form>

    <div class="wall">
        <?php
            // Perform database query using $conn
            $sql = "SELECT p_image FROM `v-wall`";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="image-container">';
                    echo '<img src="'.$row["p_image"].'" alt="Uploaded Image">';
                    echo '</div>';
                }
            } else {
                echo "No images uploaded.";
            }
        ?>
    </div>

</body>
</html>