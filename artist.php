<?php
include 'database.php';
require_once 'User.php';


class artist extends User {
    private $bank;
    private $conn;

    public function __construct($conn)
        {
            global $conn; // Access the global connection variable defined in database.php
            $this->conn = $conn; // Assign the connection to the class property

        }
        public function __destruct()
        {
            
        }

    public function register() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $firstName = $_POST["f-name"];
            $lastName = $_POST["l-name"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $username = $_POST["username"];
            $phoneNum = $_POST["phone"];
            $address = $_POST["address"];
            $bank = $_POST["bank"];
    
            if (empty(trim($firstName)) || empty(trim($lastName)) || empty(trim($email))
                 || empty(trim($password)) || empty(trim($username)) || 
                empty(trim($phoneNum)) || empty(trim($address)) || empty(trim($bank))) {
                    echo "Error: All fields are required.";
                    return;
                }
    
            $sql = "SELECT * FROM `artist` WHERE username = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                echo "Error: Username already exists.";
                $stmt->close();
                return;
            }
            $stmt->close();
    
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Error: Invalid email format.";
                return;
            }
    
            if (strlen($password) < 8) {
                echo "Error: Password must be at least 8 characters long.";
                return;
            }
    
            // $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
    
            $sql = "INSERT INTO `artist` (first_name, last_name, username, phone,
             email, address, password, bank) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            if (!$stmt) {
                echo "Error: " . $this->conn->error;
                return;
            }
            $stmt->bind_param("ssssssss", $firstName, $lastName, $username,
             $phoneNum, $email, $address, $password, $bank);
            
            if ($stmt->execute()) {
                header('location:login-a.php');
            } else {
                echo "Error: " . $stmt->error;
            }
    
            // Close statement
            $stmt->close();
        }
    }
    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];
            
    
            $sql = "SELECT * FROM `artist` WHERE username = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                
                // if (password_verify($password, $row["password"])) {
                    if ($password == $row["password"]){
                    // Start the session
                    session_start();
    
                    // Set session variables
                    $_SESSION['artist_id'] = $row["artist_id"];
                    $_SESSION['username'] = $row["username"];
                    $_SESSION['email'] = $row["email"];
                    $_SESSION['phone'] = $row["phone"];
                    $_SESSION['address'] = $row["address"];
    
                    // Redirect to the index page
                    header("location: index.php");
                    exit; // Terminate script execution after redirect
                } else {
                    echo "Incorrect password!";
                }
            } else {
                echo "Username not found!";
            }
    
            // Close statement
            $stmt->close();
        }
    }

    public function update_info() {
    
        if (isset($_SESSION['artist_id'])) {
            $userID = $_SESSION['artist_id'];
    
            if (isset($_POST['new_username']) && 
            isset($_POST['new_password'])) {
                $newUsername = $_POST['new_username'];
                $newPassword = $_POST['new_password'];
    
                if (preg_match('/^[a-zA-Z0-9]+$/', $newUsername)
                 && preg_match('/^\S+$/', $newPassword)) {
                    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    
                    $sql = "UPDATE artist SET username = ?, password = ? WHERE ID = ?";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->bind_param("ssi", $newUsername, $hashedPassword, $userID);
                    
                    if ($stmt->execute()) {
                        echo "Information updated successfully";
                    } else {
                        echo "Error updating information: " . $stmt->error;
                    }
    
                    // Close statement
                    $stmt->close();
                } else {
                    echo "Invalid username or password format";
                }
            } else {
                echo "New username and/or password not provided";
            }
        } else {
            echo "User not logged in";
        }
    }

}