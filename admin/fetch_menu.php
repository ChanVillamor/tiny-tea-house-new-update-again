<?php
// Include your database connection code here
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "products";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch products from the database grouped by category
$result = $conn->query("SELECT * FROM products ORDER BY category, name");

$products = array();
while ($row = $result->fetch_assoc()) {
    $products[] = array(
        'name' => $row['name'],
        'price' => $row['price'],
        'image' => $row['image'],
        'category' => $row['category'],
    );
}

// Output JSON response
header('Content-Type: application/json');
echo json_encode($products);

$conn->close();
?>
