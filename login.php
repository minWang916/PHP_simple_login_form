<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
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
    .container input[type="text"],
    .container input[type="password"] {
      width: 100%;
      padding: 12px 20px;
      margin-bottom: 20px;
      border: 1px solid #dddddd;
      border-radius: 4px;
      box-sizing: border-box;
      font-size: 16px;
    }
    .container input[type="submit"] {
      width: 100%;
      background-color: #4caf50;
      color: #ffffff;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }
    .container input[type="submit"]:hover {
      background-color: #45a049;
    }
    .container p {
      text-align: center;
      font-size: 14px;
      color: #777777;
    }
    .container p a {
      color: #4caf50;
      text-decoration: none;
    }
    .container p a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Login</h2>
    <form action="#" method="POST">
      <input type="text" name="getusername" placeholder="Username" required>
      <input type="password" name="getpass" placeholder="Password" required>
      <input type="submit" value="Login" name = "sub">
    </form>
    <?php
           if(isset($_POST['sub'])){
            require 'partials/_dbcon.php';
            
            $getusername=$_POST['getusername'];
            $getpassword=$_POST['getpass'];

            $sql1="select * from user_details where user_name = '$getusername' and password='$getpassword';";
            $sqlres=mysqli_query($connect, $sql1);
            $countrows=mysqli_num_rows($sqlres);

            if($countrows == 0){
                echo "<p>Account not available. Please <a href='index.php'>Sign Up.</a></p>";
            }else{
                session_start();
                $_SESSION['loggedin']=true;
                $_SESSION['sendusername']=$getusername;
                header("location: dashboard.php");
            }
           }
         ?>
    <p>Don't have an account? <a href="index.php">Sign up</a></p>
  </div>
</body>
</html>
