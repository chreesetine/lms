<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "laundry_db";

//create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn ->connect_error) {
    die("Connection error: " . $conn->connect_error);
}

$search = $_POST['search'];
$search = $conn->real_escape_string($search);

$sql = "SELECT user_id, username, first_name, last_name FROM user
        WHERE username LIKE '%$search%' OR first_name LIKE '%$search%' OR last_name LIKE '%$search%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["user_id"]. "</td>
                <td>" . $row["username"]. "</td>
                <td>" . $row["first_name"]. "</td>
                <td>" . $row["last_name"]. "</td>
                </tr>" . $row["user_role"]. "</td>
                <td>" . $row["last_active"]. "</td>
                <td>" . $row["user_status"]. "</td>
                <td>" . $row["date_created"]. "</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='8'>No results found</td></tr>";
}

$conn->close();
?>