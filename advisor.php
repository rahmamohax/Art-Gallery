<?php
require 'database.php';
require_once 'User.php';
class advisor extends User {
    private $conn;
    public function __construct ($conn){
        global $conn; 
        $this->conn = $conn;
    }
    public function __destruct()
    {
        
    }
    // Override method
    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];
    
            $sql = "SELECT * FROM advisor WHERE username = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
    
            // var_dump($result->num_rows); // Debugging
    
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                // var_dump($row); // Debugging
                if ($password == $row["password"]) {
                    session_start();
                    $_SESSION['advisor_id'] = $row["advisor_id"];
                    $_SESSION['username'] = $username;
                    echo "Logged in successfully";
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
    // Override method
    public function contact() {
        // echo "Contact method called.";
        // session_start();
        if (!isset($_SESSION['advisor_id'])) {
            echo "Error: Advisor not logged in.";
            return;
        }
        $advisorId = $_SESSION['advisor_id'];
    
        // echo "Advisor ID: " . $advisorId . "<br>"; // Debug statement
    
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
            // Validate message and username
            $message = trim($_POST["message"]);
            $username1 = trim($_POST["username"]);
            $subject = trim($_POST["subject"]);
            
            // echo "Message: " . $message . "<br>"; // Debug statement
            // echo "Username: " . $username1 . "<br>"; // Debug statement
            // echo "Subject: " . $subject . "<br>"; // Debug statement
    
            if (empty($message) || empty($username1) || empty($subject)) {
                echo "Error: Message, username, and subject cannot be empty.";
                return;
            }
    
            $userId = $this->getUserIdByUsername($username1);
            // echo "User ID: " . $userId . "<br>"; // Debug statement
    
            if ($userId === false) {
                echo "Error: User not found.";
                return;
            }
    
            $sql = "INSERT INTO advisor_msg (subject, message, advisor_id, user_id) VALUES (?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("ssii", $subject, $message, $advisorId, $userId);
    
            if ($stmt->execute()) {
                echo "Message sent successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        }
    }
    

    // Method to get user ID by username
    private function getUserIdByUsername($username1) {
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $username1);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            return $row['id'];
        } else {
            return false;
        }
    }
    public function displayMsg() {
        // Check if user is logged in
        if (!isset($_SESSION['advisor_id'])) {
            echo "Please log in as an advisor to view messages.";
            return;
        }

        // Retrieve advisor ID from session
        $advisorId = $_SESSION['advisor_id'];

        // Prepare SQL query to fetch messages for this advisor
        $sql = "SELECT user_msg.*, users.username 
            FROM user_msg 
            INNER JOIN users ON user_msg.user_id = users.id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "User: " . $row["username"] . "<br>";
            echo "Message: " . $row["message"] . "<br><br>";
        }
    } else {
        echo "No messages found.";
    }

        // Close statement
        $stmt->close();
    }
}

  
?>
