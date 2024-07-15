<?php
include 'connect.php';
if(isset($_GET['delete'])){
    $deleteID=$_GET['delete'];
    $query= mysqli_query($conn, "DELETE from `products` where product_id=$deleteID")
    or die("Deletion Failed!");
    if ($query)
    header('location:viewProd.php');
    else echo "Product isn't deleted";
}


?>