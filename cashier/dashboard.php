<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dash.css">
    <!-- <script defer src="script.js"></script> -->
    <style>
        /* Add this CSS to your existing styles or create a new CSS file */

        .user-profile .profile-dropdown {
            display: none;
            position: absolute;
            top: 50px;
            right: 30px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1;
            padding: 6px 10px;
        }

        #user-profile:hover .profile-dropdown {
            display: block;
        }

        .user-profile a {
            display: block;
            padding: 10px 15px;
            color: #333;
            text-decoration: none;
            transition: ease-in 200ms;
        }

        .user-profile a:hover {
            background-color: #a76430;
            color: #f8fae5;
            border-radius: 20px;
        }

    </style>
</head>
<body>

<!-- Sidenav -->
<?php
  require_once('sidebar/sidebar.php');
  ?>
<div class="content">
    <div class="header">
        <div class="date-time" id="date-time"></div>
        <div class="user-profile" id="user-profile">
            System Admin | 
            <div class="profile-dropdown">
                <a href="#">Profile</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </div>


    <div class="summary">
        <div class="summary-item">
            <h3>Products</h3>
            <p id="productCount">50</p>
        </div>
        <div class="summary-item">
            <h3>Orders</h3>
            <p id="orderCount">100</p>
        </div>
        <div class="summary-item">
            <h3>Daily Sales</h3>
            <p id="dailySales">$5000</p>
        </div>
    </div>

    <div class="recent-orders">
        <h2>Recent Orders</h2>
        <table>
            <!-- Table header -->
            <tr>
                <th>Customer Number</th>
                <th>Product Code</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
            <!-- Table data (you can dynamically populate this using PHP) -->
            <tr>
                <td>001</td>
                <td>P001</td>
                <td>Product A</td>
                <td>$20.00</td>
                <td>2</td>
                <td>$40.00</td>
                <td>Paid</td>
                <td>2024-01-13</td>
            </tr>
            <!-- Add more rows as needed -->
        </table>
    </div>
</div>

<script>


   function updateDateTime() {
    const now = new Date();
    const dateTimeElement = document.getElementById("date-time");

    const options = {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: 'numeric',
        minute: 'numeric',
        second: 'numeric'
    };

    const formattedDateTime = now.toLocaleDateString('en-US', options);
    dateTimeElement.innerText = formattedDateTime;
}

setInterval(updateDateTime, 1000);
updateDateTime();  // Initial update

</script>
</body>
</html>
