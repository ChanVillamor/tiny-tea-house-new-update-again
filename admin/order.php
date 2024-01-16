<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .content {
        margin-left: 250px;
        padding: 20px;
        color: #f8fae5;
        position: relative;
        }

        .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        margin-top: 10px;
        }

        .date-time {
        font-size: 18px;
        }
        
        .products-category {
            display: flex;
            gap: 2rem;
        }
        .products-category a {
            text-decoration: none;
            color: #f8fae5;
            font-size: 18px;
        }

        
    
        .menu-item {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
            text-align: center;
            width: 150px;
            height: 170px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            color: #000;
        }

        .menu-item:hover {
            transform: scale(1.05);
            
        }

        .menu-item img {
            width: 90px;
            height: 90px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 5px;
        }

        .menu-item h3 {
            font-size: 16px;
            margin: 0;
        }

        .menu-item p {
            font-size: 13px;
            margin: 5px 0;
            font-weight: bold;
            color: #4caf50;
        }

        .menu-item button {
            background-color: #f0ad52;
            color: #f8fae5;
            padding: 5px;
            border-color: transparent;
            border-radius: 5px;
            cursor: pointer;
        }
        /* order-method */
        .order-method {
            position: fixed;
            width: 32%;
            height: 1000%;
            top: 70px;
            right: 0;
            background-color: #f8fae5;
            position: absolute;
            color: #000;
        }

        .order-method table tbody .quantity-cell {
            padding-left: 30px;
        }

        .payment-section {
            position: fixed;
            bottom: 10px;
            width: 100%;
            background-color: #f8fae5;
            padding: 10px;
            box-sizing: border-box;
            font-size: 15px;
        }
        #paymentAmount {
            width: 130px;
        }

        /* menu-card */
        .menu-card {
            position: relative;
            display: flex;
            flex-wrap: wrap;
            width: 100%;
            margin-top: -20px;
            margin-bottom: 0px;
            gap: 0.5rem;
        }

        .category-title {
            position: relative;
            /* top: -50px;
            left: 40px; */

            font-size: 1.5rem;
            font-weight: 400;
        }
        .category-prod {
            display: flex;
            flex-direction: column;
            position: relative;
            width: 75%;
            position: relative;
            left: 10px;
            top: -50px;
        }
        .category {
            position: absolute;
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
            <div class="products-category" id="products">
                    <a href="">Smile</a>
            </div>
            <div class="date-time" id="date-time"></div>
    </div>
    <div class="category">
        <div class="category-prod">
            <div class="category-title">
                <h5></h5>
            </div>
            <div class="menu-card">
                    <!-- <div class="menu-item">
                        <img src="brand-logo.png" alt="Product 1">
                        <h3>23232</h3></h3>
                        <p>₱10</p>
                        <button onclick="addRow(this)">Add to Order</button>
                    </div> -->
            </div>
        </div>
        <div class="category-prod">
            <div class="category-title">
                <h5></h5>
            </div>
            <div class="menu-card">
                    <!-- <div class="menu-item">
                        <img src="brand-logo.png" alt="Product 1">
                        <h3>23232</h3></h3>
                        <p>₱10</p>
                        <button onclick="addRow(this)">Add to Order</button>
                    </div> -->
            </div>
        </div>
    </div>

    <div class="order-method">
        <table id="orderTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Order</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td class="price-cell"></td>
                    <td class="quantity-cell"></td>
                    <td class="total-cell"></td>
                    <td>
                        <!-- <button onclick="deleteRow(this)">-</button>
                        <button onclick="addQuantity(this)">+</button> -->
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="payment-section">
            <div id="totalAmount">Total Amount: ₱0.00</div>

            <label for="paymentAmount">Payment Amount:</label>
            <input type="number" id="paymentAmount" placeholder="Enter amount">

            <button onclick="calculateChange()">Save</button>

            <div id="changeAmount">Change: ₱0.00</div>
        </div>
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


// Initialize variables
let orderId = 1;
    let totalAmount = 0;

    // Function to add a row to the order table
    function addRow(button) {
        const menuItem = button.parentElement;
        const itemName = menuItem.querySelector('h3').innerText;
        const itemPrice = parseFloat(menuItem.querySelector('p').innerText.replace('₱', ''));
        
        const tableBody = document.querySelector('#orderTable tbody');
        const newRow = tableBody.insertRow();
        
        const idCell = newRow.insertCell(0);
        idCell.textContent = orderId++;

        const orderCell = newRow.insertCell(1);
        orderCell.textContent = itemName;

        const priceCell = newRow.insertCell(2);
        priceCell.classList.add('price-cell');
        priceCell.textContent = itemPrice.toFixed(2);

        const quantityCell = newRow.insertCell(3);
        quantityCell.classList.add('quantity-cell');
        quantityCell.textContent = 1;

        const totalCell = newRow.insertCell(4);
        totalCell.classList.add('total-cell');
        totalCell.textContent = itemPrice.toFixed(2);

        const actionCell = newRow.insertCell(5);
        const deleteButton = document.createElement('button');
        deleteButton.textContent = '-';
        deleteButton.onclick = function () {
            deleteRow(this);
        };
        const addQuantityButton = document.createElement('button');
        addQuantityButton.textContent = '+';
        addQuantityButton.onclick = function () {
            addQuantity(this);
        };
        actionCell.appendChild(deleteButton);
        actionCell.appendChild(addQuantityButton);

        // Update total amount
        totalAmount += itemPrice;
        updateTotalAmount();
    }

    // Function to delete a row from the order table
    function deleteRow(button) {
        const row = button.parentElement.parentElement;
        const price = parseFloat(row.querySelector('.price-cell').innerText);
        const quantity = parseInt(row.querySelector('.quantity-cell').innerText);

        // Update total amount
        totalAmount -= price * quantity;
        updateTotalAmount();

        // Remove the row
        row.remove();
    }

    // Function to add quantity to an item in the order table
    function addQuantity(button) {
        const row = button.parentElement.parentElement;
        const price = parseFloat(row.querySelector('.price-cell').innerText);

        // Update quantity
        const quantityCell = row.querySelector('.quantity-cell');
        let quantity = parseInt(quantityCell.innerText);
        quantity++;
        quantityCell.innerText = quantity;

        // Update total amount
        totalAmount += price;
        updateTotalAmount();

        // Update total cell
        const totalCell = row.querySelector('.total-cell');
        totalCell.innerText = (price * quantity).toFixed(2);
    }

    // Function to update the total amount display
    function updateTotalAmount() {
        const totalAmountElement = document.getElementById('totalAmount');
        totalAmountElement.textContent = 'Total Amount: ₱' + totalAmount.toFixed(2);
    }

    // Function to calculate change
    function calculateChange() {
        const paymentAmount = parseFloat(document.getElementById('paymentAmount').value);

        // Validate input
        if (isNaN(paymentAmount) || paymentAmount < totalAmount) {
            alert('Invalid payment amount. Please enter a valid amount.');
            return;
        }

        const changeAmount = paymentAmount - totalAmount;

        // Display change amount
        const changeAmountElement = document.getElementById('changeAmount');
        changeAmountElement.textContent = 'Change: ₱' + changeAmount.toFixed(2);
    }

    document.addEventListener('DOMContentLoaded', function () {
    // Fetch products from the server
    fetch('fetch_menu.php')
        .then(response => response.json())
        .then(products => displayMenu(products))
        .catch(error => console.error('Error fetching products:', error));
});

// Function to display products in the menu
function displayMenu(products) {
    const menuCard = document.querySelector('.menu-card');

    // Separate products by category
    const categories = {};
    products.forEach(product => {
        if (!categories[product.category]) {
            categories[product.category] = [];
        }
        categories[product.category].push(product);
    });

    // Clear existing content in menuCard
    menuCard.innerHTML = '';

    // Loop through categories and append products to corresponding sections
    Object.entries(categories).forEach(([category, productsInCategory]) => {
        // Create category title if it doesn't exist
        if (!document.querySelector(`.category-title[data-category="${category}"]`)) {
            const categoryTitle = document.createElement('h5');
            categoryTitle.textContent = category;
            categoryTitle.classList.add('category-title');
            categoryTitle.setAttribute('data-category', category);
            menuCard.appendChild(categoryTitle);
        }

        const menuSection = document.createElement('div');
        menuSection.classList.add('menu-card');
        menuCard.appendChild(menuSection);

        productsInCategory.forEach(product => {
            const menuItem = document.createElement('div');
            menuItem.classList.add('menu-item');

            menuItem.innerHTML = `
                <img src="${product.image}" alt="${product.name}">
                <h3>${product.name}</h3>
                <p>₱${product.price}</p>
                <button onclick="addRow(this)">Add to Order</button>
            `;

            menuSection.appendChild(menuItem);
        });
    });
}

</script>
</body>
</html>
