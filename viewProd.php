<?php include 'connect.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View products</title>
    <link rel="stylesheet" href="css/cart.css">

    <script src="https://kit.fontawesome.com/9a37909410.js" crossorigin="anonymous"></script>


</head>
<body>
    <h1>Veiw products</h1>
    <div class="container">
        <section class="display">
                <?php 
                $display=mysqli_query($conn, "SELECT * FROM `products`");
                $num=1;
                if(mysqli_num_rows($display)>0){
                    // echo "yes";
                    echo '<table>
                    <thead>
                        <th>Sl No</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Action</th>
                    </thead>
                    <tbody>';
                   while( $row=mysqli_fetch_assoc($display)){
                    ?>
                    
                    <!-- table row -->
                    <tr>
                        <!-- table data -->
                        <td><?php echo $num?></td>
                        <td><img src="images/products/<?php echo $row['p_image']?>" alt="" width="100"></td>
                        <td><?php echo $row['p_name']?></td>
                        <td><?php echo $row['p_description']?></td>
                        <td><?php echo $row['p_price']?></td>
                        <td>
                        <a href="delete.php?delete=<?php echo $row['product_id']?>"
                        onclick="return confirm('Are you sure you want to delete this product?')">
                        <i class="fas fa-trash"></i></a>
                        <a href="edit.php?edit=<?php echo $row['product_id']?>">
                        <i class="fas fa-edit"></i></a>
                        </td>
                    </tr>

                <?php
                $num++;
                }}else "<div class='empty'>Start Adding Products</div>";?>
                </tbody>
            </table>
        </section>

    </div>
</body>
</html>