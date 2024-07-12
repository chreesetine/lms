<?php
session_start();
if (!isset($_SESSION['user_role'])) {
    header('Location: login.php'); //will redirect the user if user_role is not set
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha384-hrmPO4HCmSpvwyuLWHX5z5xXkz8TjJU5pXcFpFQwqfOeG8Bl/5+PtcO87NNb5O4" crossorigin="anonymous">
    <link href='https://unpkg.com/@fullcalendar/core@5.10.1/main.min.css' rel='stylesheet' />
    <link rel="stylesheet" href="dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="progress"></div>
    <div class="sidebar">
        <div class="top">
            <div class="logo">
                <img src="/system/images/laundry_logo.png" alt="Laundry logo">
                <span>Azia Skye's Laundry</span>
            </div>
            <i class='bx bx-menu' id="btnMenu"></i>
        </div>

        <div class="user">
            <img src="/system/images/laundry_logo.png" alt="Profile" class="user-image">
            <div>
                <p class="bold">
                    <?php echo $_SESSION['username']; ?>
                </p>
                <p>
                    <?php echo ucfirst($_SESSION['user_role']) ?>
                </p>
            </div>
        </div>

        <ul>
            <li>
                <a href="/system/dashboard/dashboard.html">
                    <i class="bx bxs-grid-alt"></i>
                    <span class="nav-item">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>

            <li>
                <a href="/system/my profile/profile.html">
                    <i class='bx bxs-user'></i>
                    <span class="nav-item">Profile</span>
                </a>
                <span class="tooltip">Profile</span>
            </li>

            <li>
                <a href="/system/users/users.html">
                    <i class='bx bxs-group'></i>
                    <span class="nav-item">Users</span>
                </a>
                <span class="tooltip">Users</span>
            </li>

            <li>
                <a href="/system/records/records.html">
                    <i class='bx bxs-folder-open'></i>
                    <span class="nav-item">Records</span>
                </a>
                <span class="tooltip">Records</span>
            </li>

            <li>
                <a href="/system/transaction/transaction.html">
                    <i class='bx bx-transfer-alt'></i>
                    <span class="nav-item">Transaction</span>
                </a>
                <span class="tooltip">Transaction</span>
            </li>

            <li>
                <a href="/system/sales report/report.html">
                    <i class='bx bx-line-chart'></i>
                    <span class="nav-item">Report</span>
                </a>
                <span class="tooltip">Report</span>
            </li>

            <li>
                <a href="/system/settings/settings.html">
                    <i class='bx bxs-cog'></i>
                    <span class="nav-item">Settings</span>
                </a>
                <span class="tooltip">Settings</span>
            </li>
    
            <?php if ($_SESSION['user_role'] == 'admin'): ?>
                <li>
                    <a href="/system/archive/archive.html">
                        <i class='bx bxs-archive-in'></i>
                        <span class="nav-item">Archived</span>
                    </a>
                    <span class="tooltip">Archived</span>
                </li>
            <?php endif; ?>

            <li>
                <a href="logout.php">
                    <i class='bx bx-log-out'></i>
                    <span class="nav-item">Logout</span>
                </a>
                <span class="tooltip">Logout</span>
            </li>
        </ul>
    </div>

    <div class="main-content">
        <div class="container">
            <h1>Dashboard</h1>

            <!--CALENDAR-->
            <div class="main-calendar"> <!--calendar//left-side-->
                <div class="calendar-header">
                    <button id="prevYear">&lt;</button>
                    <span id="year">2024</span>
                    <button id="nextYear">&gt;</button>
                </div>
                <!--bagong dagdag yung months 6/22/24 21:41-->
                <div id="months"></div>
                <div id="calendar"></div>
            </div>

            <div clas="right-side">
                <h2>Service Events</h2>
                <ul id="services">

                </ul>
            </div>

        </div>

        <div class="cards">
            <div class="card">
                <h3>Pick-Up Orders</h3>
                <p id="pickup-orders">0</p>
                <!-- <div class="progress">
                    <svg>
                        <circle cx='38' cy='38' r='36'></circle>
                    </svg>
                    <div class="number">
                        <p>56%</p>
                    </div> -->
            </div>
            <div class="card">
                <h3>Delivery orders</h3>
                <p id="delivery-orders">0</p>
            </div>
            <div class="card">
                <h3>Rush orders</h3>
                <p id="rush-orders">0</p>
            </div>
        </div>

        <div class="charts">
            <div class="chart">
                <h3>Orders In Day</h3>
                <canvas id="orders-day-chart"></canvas>
            </div>

            <div class="chart">
                <h3>Orders In Week</h3>
                <canvas id="orders-week-chart"></canvas>
            </div>

            <div class="chart">
                <h3>Orders In Month</h3>
                <canvas id="orders-month-chart"></canvas>
            </div>

            <div class="chart">
                <h3>Orders In Year</h3>
                <canvas id="orders-year-chart"></canvas>
            </div>
        </div>

    </div>


    <!-- <div class="calendar">
        <div id="calendar"></div>
    </div> -->
</body>

<script src="dashboard.js"></script>

</html>