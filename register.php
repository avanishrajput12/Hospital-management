<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modern Register Page</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }

    body {
     background-color: #c258f4ff;  
      
    }
    .register-container {
     background: linear-gradient(135deg, #199ce8ff, #e6204eff);
      margin: 60px auto;
      padding: 40px;
      width: 400px;
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(218, 13, 13, 0.89);
      transition: transform 0.3s ease;
    }

    .register-container:hover {
      transform: translateY(-5px);
    }

    .register-container h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #333;
    }

    .register-form {
      display: flex;
      flex-direction: column;
    }

    .register-form input {
      margin-bottom: 15px;
      padding: 12px 14px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 15px;
      transition: border 0.3s ease, box-shadow 0.3s ease;
    }

    .register-form input:focus {
      border: 1px solid #667eea;
      outline: none;
      box-shadow: 0 0 8px rgba(102, 126, 234, 0.4);
    }

    .register-form button {
      padding: 12px;
      background: #667eea;
      color: #fff;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s ease;
    }
     .register-form input[type="submit"] {
      background: #10d90de6;
    }

    .register-form input[type="submit"]:hover {
      background: #764ba2;
    }

    .extra-links {
      text-align: center;
      margin-top: 15px;
      font-size: 14px;
    }

    .extra-links a {
      color: #667eea;
      text-decoration: none;
    }

    .extra-links a:hover {
      text-decoration: underline;
    }
     footer {
            background-color: #5834cfff;
            text-align: center;
            padding: 20px;
            color: #ecefeeff;
            margin-top: 20px;
        }

        footer p {
            margin: 5px 0;
        }

        footer a {
            color: #b328e6;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
  </style>
</head>
<body>
    <?php include 'nav.php'; ?>

  <div class="register-container">
    <h2>Create Account</h2>
    <form class="register-form" method="POST" action="">
      <input type="text" name="username" placeholder="Full Name" required>
      <input type="tel" name="number" placeholder="Phone Number" required>
      <input type="email" name="email" placeholder="Email Address" required>
      <input type="password" name="pass" placeholder="Password" required>
      <input type="password" name="repass" placeholder="Re-enter Password" required>
      <input type="submit" name="sbt" value="Register">
    </form>
    <div class="extra-links">
      Already have an account? <a href="login.php">Login</a>
    </div>
  </div>
  <footer>
        <p>&copy; 2025 Godwin Medical College Hospital. All rights reserved.</p>
        <p>Designed by <a href="#">Godwin Web Team</a></p>
    </footer>

</body>
</html>

<?php
if(isset($_REQUEST['sbt'])){
  include "database.php";
  $db = new Database();
$conn = $db->connect(); 
  $name=$_REQUEST['username'];
  $number=$_REQUEST['number'];
  $email=$_REQUEST['email'];
  $pass=$_REQUEST['pass'];
  $repass=$_REQUEST['repass'];
  if($pass==$repass){
     $hashed = password_hash($pass, PASSWORD_DEFAULT);
    $sid=rand(1000,9999);
    $sql="INSERT INTO username(user_id,username,phone,email, password) VALUES ('$sid','$name','$number','$email','$pass')";
    $result=mysqli_query($conn,$sql);
    if($result){
      echo "<script>alert('Registration Successful')</script>";
      echo "<script>window.location='login.php'</script>";
    }else{
      echo "<script>alert('Registration Failed')</script>";
    }
  }else{

    echo "<script>alert('Password Not Matched')</script>";
  }
}
