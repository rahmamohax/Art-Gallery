<?php 
include('database/database.php');
// Create a new instance of the Database class
$db = new Database('localhost', 'root', '', 'your_database_name');

if (isset($_POST['add'])){
    $id = $_POST['id'];
    $name=$_POST['name'];
    $price = $_POST['price'];
    $des=$_POST['des'];
    $img = $_POST['image'];

    // Example of updating a product in the 'products' table using the Database class
    $updateData = array('p_isactive' => '0');
    $updateCondition = "p_name='$name'";
    $updateResult = $db->update('products', $updateData, $updateCondition);

    if (!$updateResult) {
        echo 'Failed to update product status.';
    } else {
        // Check if the product is already in the cart
        $selectCondition = "name='$name'";
        $existingProduct = $db->select('cart', '*', $selectCondition);

        if (!empty($existingProduct)) {
            echo 'Product is already in the cart.';
        } else {
            // Insert the product into the cart table
            $insertData = array(
                'name' => $name,
                'price' => $price,
                'image' => $img,
                'description' => $des,
                'isactive' => '0'
            );
            $insertResult = $db->insert('cart', $insertData);

            if ($insertResult) {
                echo "Product added to cart successfully.";
            } else {
                echo "Failed to add product to cart.";
            }
        }
    }
} else {
    echo "No image uploaded";
}
?>