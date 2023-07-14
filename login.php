<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<style>
  body {
    font-family: Arial, sans-serif;
    animation: colorChange 10s infinite;
    background-image: url('https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885_1280.jpg');
    background-size: cover;
    background-position: center;
  }
  
  @keyframes colorChange {
    0% { background-color: #f1f1f1; }
    50% { background-color: #dcdcdc; }
    100% { background-color: #f1f1f1; }
  }
  
  h2 {
    color: #333333;
  }
  
  form {
    background-color: #ffffff;
    padding: 20px;
    border: 2px solid violet;
    border-radius: 5px;
    width: 300px;
    margin: 0 auto;
    margin-top: 100px;
  }
  
  input[type="text"],
  input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #cccccc;
    border-radius: 5px;
    box-sizing: border-box;
  }
  
  input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
  }
  
  input[type="submit"]:hover {
    background-color: #45a049;
  }
  
  .error-message {
    color: #ff0000;
  }
</style>
</head>
<body>
<center>
<h2>Login Page</h2><br>
<form method="post" action="">
Username: <input type="text" name="username" placeholder="ADMIN"><br><br>
Password: <input type="password" name="password" placeholder="Enter your password"><br><br>
<input type="submit" name="submit" value="Login">
</form>

<?php
session_start();
require('configall.php');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM admin WHERE username='$username' and password='$password'";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $count = mysqli_num_rows($result);
    
    if ($count == 1) {
        $_SESSION['username'] = $username;
        echo "<p style='color: #00cc00;'>You have logged in successfully</p>";
        header("location: home.php");
        exit();
    } else {
        $fmsg = "Invalid username or password";
        echo "<p style='color: #ff0000;'>Invalid username or password</p>";
    }
}
?>

</center>
</body>
</html>





