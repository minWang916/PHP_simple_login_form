<?php
  session_start();
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
  }
  
?>

<!DOCTYPE html>
<html>
<head>
  <title>Welcome</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 400px;
      margin: 0 auto;
      padding: 40px;
      background-color: #ffffff;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      border-radius: 5px;
      margin-top: 100px;
    }
    .container h2 {
      text-align: center;
      margin-bottom: 30px;
      color: #333333;
    }
    .container p {
      text-align: center;
      font-size: 16px;
      color: #777777;
      margin-bottom: 20px;
    }
    .container span {
      color: #4caf50;
      font-weight: bold;
    }
    .container a {
      color: #4caf50;
      text-decoration: none;
      font-weight: bold;
    }
    .container a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Welcome</h2>
    <p>Welcome, <span><?php echo $_SESSION['sendusername'];?></span>!</p>
    <p>You are now logged in.</p>
    <p><a href="login.php">Logout</a></p>
  </div>
</body>
</html>
