<?php
ob_start(); // Output buffering starts

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection code here
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "products";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle delete button click
    if (isset($_POST['delete_product'])) {
        $productId = mysqli_real_escape_string($conn, $_POST['product_id']);
        $sql = "DELETE FROM products WHERE id = '$productId'";

        if ($conn->query($sql) === TRUE) {
            // Redirect to the same page to fetch and display the latest data
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }

    // Your existing PHP code for handling form submission
    // ...

    // Add the following lines to handle the category
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);

    // Handle file upload
    $targetDir = "uploads";
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $targetFile = $targetDir . DIRECTORY_SEPARATOR . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size (adjust the limit as needed)
    if ($_FILES["image"]["size"] > 5000000) {
        echo "Sorry, your file is too large. Maximum allowed size is 5 MB.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    $allowedFormats = ["jpg", "jpeg", "png", "gif"];
    if (!in_array($imageFileType, $allowedFormats)) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // Insert product into the database
            $imagePath = "uploads/" . basename($_FILES["image"]["name"]);
            $sql = "INSERT INTO products (name, price, image, category) VALUES ('$name', $price, '$imagePath', '$category')";

            if ($conn->query($sql) === TRUE) {
                // Redirect to the same page to fetch and display the latest data
                header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $conn->close();
}

ob_end_flush(); // Output buffering ends and content is sent to the browser
?>

<!-- Rest of your HTML code -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Inventory</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .content {
            position: relative;
            width: 82%;
            height: 100vh;
            left: 245px;
            background-color: #2b0303;
        }

        #add-product-btn {
            background-color: #f0ad52;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 20px;
            margin-top: 50px;
            margin-left: 30px;
        }

        #product-table {
            width: 95%;
            border-collapse: collapse;
            background-color: #f8fae5;
            margin: 40px auto;
        }

        #product-table th,
        #product-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            background-color: #f8fae5;
        }

        #product-table th {
            background-color: #a76430;
            color: #f8fae5;
        }

        .action-buttons button {
            background-color: #4caf50;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 5px;
        }

        #product-form-container {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            z-index: 1000;
            }
            #product-form {
                max-width: 400px;
                margin: 0 auto;
            }

            label {
                display: block;
                margin-bottom: 8px;
                font-weight: bold;
            }

            input {
                width: 100%;
                padding: 8px;
                margin-bottom: 12px;
                box-sizing: border-box;
            }

            button#close-product-form {
                background-color: #ddd;
                color: #333;
            }
        </style>
</head>
<body>
<?php
require_once('sidebar/sidebar.php');
?>

<div class="content">

    <button id="add-product-btn" onclick="toggleProductForm()">Add New Product</button>

    <table id="product-table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Category</th> <!-- Added the Category column -->
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
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

            $result = $conn->query("SELECT * FROM products");

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td><img src="' . htmlspecialchars($row["image"]) . '" alt="" srcset="" width="70px" height="50px"></td>';
                    echo '<td>' . htmlspecialchars($row["name"]) . '</td>';
                    echo '<td>' . htmlspecialchars($row["price"]) . '</td>';
                    echo '<td>' . htmlspecialchars($row["category"]) . '</td>'; // Display category
                    echo '<td>';
                    echo '<form method="post" action="">';
                    echo '<input type="hidden" name="product_id" value="' . $row["id"] . '">';
                    echo '<button type="submit" name="delete_product">Delete</button>';
                    echo '<button type="submit" name="update_product">Update</button>';
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="5">No products found</td></tr>';
            }

            $conn->close();
            ?>
        </tbody>
    </table>

    <div id="product-form-container">
        <div id="product-form">
            <form id="upload-form" enctype="multipart/form-data" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <label for="name">Product Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="price">Product Price:</label>
                <input type="number" id="price" name="price" step="0.01" required>

                <label for="image">Product Image:</label>
                <input type="file" id="image" name="image" accept="image/*" required>

                <label for="category">Product Category:</label>
                <select id="category" name="category" required>
                    <option value="Drinks">Drinks</option>
                    <option value="Foods">Foods</option>
                </select>

                <button type="submit" onclick="addProduct()">Add Product</button>
                <button id="close-product-form" onclick="toggleProductForm()">Close</button>

            </form>
        </div>
    </div>

</div>
<script>
    function toggleProductForm() {
        var formContainer = document.getElementById('product-form-container');
        formContainer.style.display = (formContainer.style.display === 'none') ? 'block' : 'none';
    }

    function addProduct() {
        // Disable the form submission button to prevent multiple submissions
        var addButton = document.querySelector("#upload-form button[type='button']");
        addButton.disabled = true;

        // Your existing AJAX logic for adding the product
        // ...

        // After completing the AJAX request, enable the button
        // This can be done in the success or error callback of the AJAX request
        // For simplicity, I'm using a setTimeout to simulate the AJAX request completion
        setTimeout(function () {
            addButton.disabled = false;
        }, 1000); // Adjust the delay as needed
    }
</script>
</body>
</html>
