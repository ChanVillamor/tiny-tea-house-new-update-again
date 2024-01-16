<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- <script defer src="script.js"></script> -->

    <style>
      
/* Sidebar for larger screens */
body {
   margin: 0;
   font-family: Arial, sans-serif;
   background-color: #2b0303;
}

.sidebar {
   width: 18%;
   height: 100%;
   background-color: #f8fae5;
   position: fixed;
   padding-top: 20px;
   transition: 0.3s;
  
}

.sidebar .logo {
   text-align: center;
}

.sidebar ul {
   list-style-type: none;
   padding: 0;
   display: flex;
   flex-direction: column;
   margin-left: 20%;
   margin-top: 30px;
   text-align: justify;
}

.sidebar li {
   padding: 20px;
  
}

.sidebar a {
   color: #000;
   text-decoration: none;
   transition: ease-in-out 250ms;
}

.sidebar a:hover {
   background-color: #a76430;
   color: #f8fae5;
   padding: 10px 15px;
   border-radius: 20px;
}

/* Media query for smaller screens */
@media screen and (max-width: 768px) {
   .sidebar {
       width: 0;
       overflow: hidden;
   }

   .sidebar ul {
       display: flex;
       flex-direction: column;
       align-items: center;
   }

   .sidebar.responsive {
       width: 100%;
   }
}
    </style>
</head>
<body>

<div class="sidebar">
    <div class="logo">
        <img src="brand-logo.png" alt="logo" width="100" height="100">
    </div>
    <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="crew.php">Crew Set-Up</a></li>
        <li><a href="order.php">Order</a></li>
        <li><a href="product.php">Products</a></li>
        <li><a href="sales.php">Sales</a></li>
    </ul>
</div>
</body>
</html>