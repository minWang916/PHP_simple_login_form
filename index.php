<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
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
    <h2>Register</h2>
    <form action="#" method="POST">
      <input type="text" name="getname" placeholder="Name" required>
      <input type="text" name="getusername" placeholder="Username" required>
      <input type="password" name="getpass" placeholder="Password" required>
      <input type="password" name="conpass" placeholder="Confirm Password" required>
      <input type="submit" value="Register" name="sub">
    </form>
    <?php
           if(isset($_POST['sub'])){
            require 'partials/_dbcon.php';
            $getname=$_POST['getname'];
            $getusername=$_POST['getusername'];
            $getpass=$_POST['getpass'];
            $conpass=$_POST['conpass'];

            $sql="select user_name from user_details where user_name = '$getusername'";
            $sqlres=mysqli_query($connect, $sql);
            $rowcount=mysqli_num_rows($sqlres);

            if($rowcount !=0){
                echo "User name is not available. Try another one";
            }
            if($getpass != $conpass){
                echo "Confirm password properly";
            }
            if(($rowcount ==0) && ($getpass == $conpass)){
                echo "<p>You have successfully signed up.</p>";
                $sql="insert into user_details (full_name, user_name, password) values ('$getname','$getusername','$getpass')";
                $sqlres=mysqli_query($connect, $sql);
            }
           }
         ?>
    <p>Already have an account? <a href="login.php">Login</a></p>
  </div>
</body>
</html>
