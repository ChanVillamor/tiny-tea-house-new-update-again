
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales</title>
    <link rel="stylesheet" href="dash.css">
    <!-- <script defer src="script.js"></script> -->
    <style>
        /* Add this CSS to your existing styles or create a new CSS file */

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            margin-left: 5px;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #a76430;
            color: #f8fae5;
        }

        .dropdown:hover .dropdown-content {
            display: block;
            background-color: #f8fae5;
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
        <div class="dropdown">
            <span>Select Period</span>
            <div class="dropdown-content">
               <a href="#">Daily</a>
               <a href="#">Weekly</a>
               <a href="#">Monthly</a>
               <a href="#">Yearly</a>
            </div>
         </div>
    </div>


    <div class="summary">
        <div class="summary-item">
            <h3>Sales</h3>
            <p id="productCount">50</p>
        </div>
        <div class="summary-item">
            <h3>Total Orders</h3>
            <p id="orderCount">100</p>
        </div>
        <div class="summary-item">
            <h3>Avg. Orders Value</h3>
            <p id="dailySales">$5000</p>
        </div>
    </div>

    <div class="recent-orders">
        <h2>Recent Orders</h2>
        <table>
            <!-- Table header -->
            <tr>
                <th>Order ID</th>
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
