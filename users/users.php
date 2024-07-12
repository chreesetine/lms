<?php
/* $servername = "localhost";
$username = "root";
$password = "";
$dbname = "laundry_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
} */

require_once('users_db.php');

$search = "";
if(isset($_POST['search'])) {
    $search = $con->real_escape_string($_POST['search']);
    $query = "SELECT * FROM user WHERE username LIKE '%$search%' OR first_name LIKE '%$search%' OR last_name LIKE '%$search%'";
} else {
    $query = "SELECT * FROM user";
}

$result = mysqli_query($con, $query);

if (!$result) {
    die("Query error: " . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha384-hrmPO4HCmSpvwyuLWHX5z5xXkz8TjJU5pXcFpFQwqfOeG8Bl/5+PtcO87NNb5O4" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="users.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="progress"></div>
    <div class="sidebar">
        <div class="top">
            <div class="logo">
                <img src="/images/laundry_logo.png" alt="Laundry logo">
                <span>Azia Skye's Laundry</span>
            </div>
            <i class='bx bx-menu' id="btnMenu"></i>
        </div>

        <div class="user">
            <img src="/images/laundry_logo.png" alt="Profile" class="user-image">
            <div>
                <p class="bold">Doris</p>
                <p>Admin</p>
            </div>
        </div>

        <ul>
            <li>
                <a href="/laundry_system/dashboard/dashboard.html">
                    <i class="bx bxs-grid-alt"></i>
                    <span class="nav-item">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>

            <li>
                <a href="/laundry_system/my profile/profile.html">
                    <i class='bx bxs-user'></i>
                    <span class="nav-item">Profile</span>
                </a>
                <span class="tooltip">Profile</span>
            </li>

            <li>
                <a href="/laundry_system/users/users.html">
                    <i class='bx bxs-group'></i>
                    <span class="nav-item">Users</span>
                </a>
                <span class="tooltip">Users</span>
            </li>

            <li>
                <a href="/laundry_system/records/records.html">
                    <i class='bx bxs-folder-open'></i>
                    <span class="nav-item">Records</span>
                </a>
                <span class="tooltip">Records</span>
            </li>

            <li>
                <a href="/laundry_system/transaction/transaction.html">
                    <i class='bx bx-transfer-alt'></i>
                    <span class="nav-item">Transaction</span>
                </a>
                <span class="tooltip">Transaction</span>
            </li>

            <li>
                <a href="/laundry_system/sales report/report.html">
                    <i class='bx bx-line-chart'></i>
                    <span class="nav-item">Report</span>
                </a>
                <span class="tooltip">Report</span>
            </li>

            <li>
                <a href="/laundry_system/settings/settings.html">
                    <i class='bx bxs-cog'></i>
                    <span class="nav-item">Settings</span>
                </a>
                <span class="tooltip">Settings</span>
            </li>

            <li>
                <a href="/laundry_system/archive/archive.html">
                    <i class='bx bxs-archive-in'></i>
                    <span class="nav-item">Archived</span>
                </a>
                <span class="tooltip">Archived</span>
            </li>

            <li>
                <a href="">
                    <i class='bx bx-log-out'></i>
                    <span class="nav-item">Logout</span>
                </a>
                <span class="tooltip">Logout</span>
            </li>
        </ul>
    </div>

    <div class="main-content"> <!--container-->
        <div class="container">
            <h1>Users</h1>
        </div>        
        
        <!--<div class="side">
            <form action="" method="get">
                <div class="search-box">
                    <input type="text" name="search" placeholder="Search..." class="input_search" required>
                    <button type="submit" name="btnSearch"><i class='bx bx-search'></i></button>
                </div>
            </form>
        </div>    -->

        <div class="card-body">
            <form action="users.php" method="POST">
                <div class="input-group mb-3">
                    <input type="text" name="search" required value="<?php echo htmlspecialchars($search); ?>" class="form-control" placeholder="Search">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div> 
            </form>     <!--dapat katabi ni Users-->

            <form action="add_users.php" method="POST">
                <div class="add_button">
                    <button type="button" class="btn btn-success">Add User</button>
            </form>    

            <table class="table table-bordered text-center">
                <thead>
                    <tr class="bg-dark text-white">                             
                        <th>User ID</th>
                        <th>Username</th>                       
                        <th>First name</th>
                        <th>Last name</th>
                        <th>User Role</th>
                        <th>Last Active</th>
                        <th>User Status</th>
                        <th>Date Created</th>
                        <th>Edit</th>
                        <th>Archive</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if ($result->num_rows > 0) {
                        while($row = mysqli_fetch_assoc($result))
                        {
                    ?>
                        <tr>
                            <td><?php echo $row['user_id']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['first_name']; ?></td>
                            <td><?php echo $row['last_name']; ?></td>
                            <td><?php echo $row['user_role']; ?></td>
                            <td><?php echo $row['last_active']; ?></td>
                            <td><?php echo $row['user_status']; ?></td>
                            <td><?php echo $row['date_created']; ?></td>
                            <td><i class="bx bxs-edit"></i></td>
                            <td><i class="bx bxs-folder-minus"></i></td>
                        </tr>
                    <?php
                        }
                    } else {
                    ?>
                        <tr>
                            <td colspan="10">No results found</td>
                        </tr>
                    <?php
                    }
                    ?>      
                </tbody>
            </table>
        </div>     
    </div>
</body>

<script type="text/javascript" src="users.js"></script>

</html>

<?php
$con->close();
?>