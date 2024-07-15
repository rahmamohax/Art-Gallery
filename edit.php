<?php
    include 'connect.php';
    if(isset($_POST['update'])){
        $editID= $_POST['editID'];
        $editName= $_POST['editName'];
        $editDes= $_POST['editDes'];
        $editPrice= $_POST['editPrice'];

        // if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $editImg= $_FILES['editImg']['name'];
            $editImg_temp= $_FILES['editImg']['temp_name'];
            $editImg_folder= 'image/products/'. $editImg;

            if($editImg==null){
                $query= mysqli_query($conn, "UPDATE `products` set 
            p_name='$editName', p_price='$editPrice' where product_id='$editID'");
            }
            else{ $query= mysqli_query($conn, "UPDATE `products` set 
                    p_name='$editName', p_price='$editPrice', p_image='$editImg' where product_id='$editID'");}
            if ($query){
                move_uploaded_file($editImg_temp, $editImg_folder);
                header('location:viewProd.php');
            } else {
                echo "Error";
            }
        // }
    }
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update products</title>
    <link rel="stylesheet" href="css/cart.css">

    <script src="https://kit.fontawesome.com/9a37909410.js" crossorigin="anonymous"></script>

</head>
<body>
    <section class="">
    <?php
        include 'connect.php';
        if(isset($_GET['edit'])){
            $editID=$_GET['edit'];
            $query= mysqli_query($conn, "SELECT * from `products` where product_id=$editID")
            or die("Deletion Failed!");
            if(mysqli_num_rows($query)>0){ 
                while($fetch= mysqli_fetch_assoc($query)){
                ?>

            <form action="" method="post" class="add" enctype="multipart/form-data">
                    <img src="images/products/<?php echo $fetch['p_image']?>" width=100 alt="">
                    <input name='editID' type="hidden" value=<?php echo $fetch['product_id']?>>
                    <input  name='editName' type="text" id="" class="input_fields" value=<?php echo $fetch['p_name']?>>
                    <input  name='editDes' type="text" id="" class="input_fields" value=<?php echo $fetch['p_description']?>>
                    <input  name='editPrice' type="number" min="0" name="price" id="" class="input_fields" value=<?php echo $fetch['p_price']?> >
                    <input  name='editImg' type="file" name="image" id="" class="input_fields" accept="image/png, image/jpg, image/jpeg">
                    <div class="btns">
                    <input type="submit" id="" class="submit_btn" name='update'>
                    <input type="reset" value='cancel' name="" id="close-edit" class="cancel_btn"> 
                    </div>
                </form>

<?php
            }}
            // if ($query)
            // header('location:viewProd.php');
            // else echo "Product isn't deleted";
        }
?>
    
    </section>
</body>