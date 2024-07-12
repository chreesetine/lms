<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<?php
$servername = "localhost";
$username = "username";
$password = "";
$dbname = "laundry_db";

$username = $_POST['username'];
$password = $_POST['password'];

$conn = new mysqli('$servername', '$username', '$password', '$dbname');

if($conn->connect_error) { 
        die('Failed to connect : '.$conn->connect_error);
    } 
    
    else {
        $stmt = $conn->prepare("select * from user_profile where username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt_result = $stmt->get_result();

        if($stmt_result->num_rows > 0) {
            $data = $stmt_result->fetch_assoc();
            if($data['password'] === $password){
                header('location:dashboard.php');
            } else {
                echo "<script>alert('Invalid username or password')</script>";
            }
        } else {
            echo "<script>alert('Invalid username or password')</script>";
        }
    }
?>