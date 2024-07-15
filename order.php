<?php 
    include 'database.php';
class order{
    protected static $orderid = 0;
    protected $name;
    protected $email;
    protected $phone;
    protected $price;
    protected $Saddress;
    protected $Baddress;
    protected $pin;
    private $conn;

    public function __construct($conn){
            global $conn; // Access the global connection variable defined in database.php
            $this->conn = $conn; // Assign the connection to the class property
        }
        public function __destruct(){}

    public function placeOrder(){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $this->name = $_POST["username"];
            $this->email = $_POST["email"];
            $this->phone = $_POST["phone"];
            $this->pin = $_POST["pin-code"];
            $this->Baddress = $_POST["b-address"];
            $this->Saddress = $_POST["s-address"];
            
            $stmt = $this->conn->prepare("INSERT INTO `orders` (username, email, phone, pin, price, billing_address, shipping_address) 
                                VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssdss", $this->name, $this->email, $this->phone, $this->pin, $this->total, $this->Baddress, $this->Saddress);
            $total = 0; // You need to set $total according to your logic
            $stmt->execute();

            // Check for insert success
            if($stmt->affected_rows > 0){
                // Delete records from cart
                $stmt = $this->conn->query("DELETE FROM `cart`");
                if ($conn->query($stmt) === TRUE) {
                    // Retrieve the ID of the last inserted row
                    $last_id = $conn->insert_id;
                    echo "New record created successfully. Last inserted ID is: " . $last_id;
                    header("Location: invoice.php?id=$last_id");
                    exit;
                 }
            }
             else {
                echo "Error placing order: " . $this->conn->error;
            }
        
        // Close statement and connection
        $stmt->close();
    }
    }
    public function displayInvoice(){
        session_start();  
        $_SERVER['username']= $name;
        $_SERVER['email']= $email;
        $_SERVER['phone']= $phone;
        $_SERVER['price']= $price;
        $_SERVER['Badd']= $Baddress;
        $_SERVER['Sadd']= $Saddress;
    }
}
?>
