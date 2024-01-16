<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>

   <style>
        .content {
            font-family: Arial, sans-serif;
            background-color: #2b0303;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin-left: 200px;
        }

        form {
            width: 400px;
            padding: 40px;
            background-color: #f8fae5;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 400px;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
            
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
   
   <!-- Sidenav -->
<?php
  require_once('sidebar/sidebar.php');
  ?>

  <div class="content">
   <form id="crew-setup-form">
      <label for="staffName">Staff Name:</label>
      <input type="text" id="staffName" name="staffName" required>

      <label for="staffNumber">Staff Number:</label>
      <input type="text" id="staffNumber" name="staffNumber" required>

      <label for="staffEmail">Staff Email:</label>
      <input type="email" id="staffEmail" name="staffEmail" required>

      <label for="staffPassword">Staff Password:</label>
      <input type="password" id="staffPassword" name="staffPassword" required>

      <button type="button" onclick="addStaff()">Add Staff</button>
   </form>
  </div>
</body>
</html>