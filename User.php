<?php 
        require 'database.php';
        class User{
        protected static $id = 0;
        protected $email;
        protected $password;
        protected $ID;
        protected $username;
        protected $phoneNum;
        protected $firstName;
        protected $lastName;
        protected $address;
        public $isLoggedin = false;
        private $conn;


        public function __construct($conn)
        {
            global $conn; // Access the global connection variable defined in database.php
            $this->conn = $conn; // Assign the connection to the class property

        }
        public function __destruct()
        {
            
        }

        // getters, setters, and methods 

        public function getName($firstName, $lastName){
            return $this->firstName . ' ' . $this->lastName;
        } 
        public function getEmail($email){
            return $this->email;
        }
        public function getUsername($username){
            return $this->username;
        }
        public function getAddress($address){
            return $this->address;
        }
    

        // methods

        public function register() {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $firstName = $_POST["f-name"];
                $lastName = $_POST["l-name"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $username = $_POST["username"];
                $phoneNum = $_POST["phone"];
                $address = $_POST["address"];
        
                if (empty(trim($firstName)) || empty(trim($lastName)) || empty(trim($email))
                 || empty(trim($password)) || empty(trim($username)) || 
                empty(trim($phoneNum)) || empty(trim($address))) {
                    echo "Error: All fields are required.";
                    return;
                }
        
                $sql = "SELECT * FROM users WHERE username = ?";
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
        
                $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
        
                $sql = "INSERT INTO users (first_name, last_name, username, phone,
                 email, address, password) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = $this->conn->prepare($sql);
                if (!$stmt) {
                    echo "Error: " . $this->conn->error;
                    return;
                }
                $stmt->bind_param("sssssss", $firstName, $lastName, $username,
                 $phoneNum, $email, $address, $hashed_pass);
                
                if ($stmt->execute()) {
                    // echo "Registration successful!";
                    header("location: login-u.php");
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
                

                $sql = "SELECT * FROM users WHERE username = ?";
                $stmt = $this->conn->prepare($sql);
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $result = $stmt->get_result();
        
                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
                    // echo $password;
                    if (password_verify($password, $row["password"])) {
                        // Start the session
                        session_start();
        
                        // Set session variables
                        $_SESSION['user_id'] = $row["id"];
                        $_SESSION['username'] = $row["username"];
                        $_SESSION['email'] = $row["email"];
                        $_SESSION['Phone'] = $row["Phone"];
                        $_SESSION['address'] = $row["Address"];
        
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
            // session_start();
        
            if (isset($_SESSION['user_id'])) {
                $userID = $_SESSION['user_id'];
        
                if (isset($_POST['new_username']) && 
                isset($_POST['new_password'])) {
                    $newUsername = $_POST['new_username'];
                    $newPassword = $_POST['new_password'];
        
                    if (preg_match('/^[a-zA-Z0-9]+$/', $newUsername)
                     && preg_match('/^\S+$/', $newPassword)) {
                        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        
                        $sql = "UPDATE users SET username = ?, password = ? WHERE ID = ?";
                        $stmt = $this->conn->prepare($sql);
                        $stmt->bind_param("ssi", $newUsername, $hashedPassword, $userID);
                        
                        if ($stmt->execute()) {
                            echo "Information updated successfully";
                            // header('location:login.php');
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
        
      //public function addCart(){}
      public function contact() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
            session_start();
            if (!isset($_SESSION['user_id'])) {
                echo "Error: User not logged in.";
                return;
            }
           
            $userId = $_SESSION['user_id'];

            $subject = trim($_POST["subject"]);
            $message = trim($_POST["message"]);

            if (empty($subject) || empty($message)) {
                echo "Error: Subject and message cannot be empty.";
                return;
            }
            $sql = "INSERT INTO user_msg (subject, message, user_id) VALUES (?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("ssi", $subject, $message, $userId);
            
            if ($stmt->execute()) {
                // echo "Message sent successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        }
    }

    public function receiveMsg() {
        // Start session to retrieve user ID
        session_start();
        
        // Check if the user is logged in
        if (!isset($_SESSION['user_id'])) {
            echo "Error: User not logged in.";
            return;
        }

        // Retrieve user ID from session
        $userId = $_SESSION['user_id'];

        // Prepare and execute SQL query to fetch messages for the user
        $sql = "SELECT * FROM advisor_msg WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if any messages are found
        if ($result->num_rows > 0) {
            // Display the received messages
            while ($row = $result->fetch_assoc()) {
                echo "<p>Subject: " . $row['subject'] . "</p>";
                echo "<p>Message: " . $row['message'] . "</p>";
                echo "<hr>";
            }
        } else {
            echo "No messages found.";
        }
    }      
    public function viewWall() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST["submit"])) {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check === false) {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }

                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }

                if ($_FILES["fileToUpload"]["size"] > 50000000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }

                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }

                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        // Insert uploaded image information into the database
                        $sql = "INSERT INTO `v-wall` (wall_url, p_image) VALUES ('$target_file', '$target_file')";
                        if ($this->conn->query($sql) === TRUE) {
                            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded and inserted into the database.";
                        } else {
                            echo "Error: " . $sql . "<br>" . $this->conn->error;
                        }
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            }
        }
    }
    public function logout() {
        // Start the session
        // session_start();
    
        // Unset all session variables
        session_unset();
    
        // Destroy the session
        session_destroy();
    
        // Redirect to the login page
        header("location: log.php");
        exit; // Terminate script execution after redirect
    }
}

?>