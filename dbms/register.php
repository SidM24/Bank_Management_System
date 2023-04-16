<?php require_once "connect1.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="styles2.css">
</head>
<body>
<div class="register-box">
<form method="post" action="">
  <label for="email">Email:</label>
  <input type="text" id="email" name="email"required><br>
  
  <label for="password">Password:</label>
  <input type="password" id="password" name="password" required><br>
  
  <label for="first_name">First Name:</label>
  <input type="text" id="first_name" name="first_name"required><br>
  
  <label for="last_name">Last Name:</label>
  <input type="text" id="last_name" name="last_name"required><br>
  
  <label for="mobile_number">Mobile Number:</label>
  <input type="text" id="mobile_number" name="mobile_number"required><br>
  
  <label for="street">Street:</label>
  <input type="text" id="street" name="street"required><br>
  
  <label for="city">City:</label>
  <input type="text" id="city" name="city"required><br>
  
  <button type="submit" name="submit">Submit</button>
</form>
<h3><a href=login.php>go to login page</a></h3>

</body>
</html>