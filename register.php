<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register Page</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Segoe UI", sans-serif;
    }

    body {
      background: linear-gradient(to right, #667eea, #764ba2);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .register-box {
      background-color: #ffffff;
      padding: 30px 25px;
      border-radius: 10px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
      width: 100%;
      max-width: 400px;
    }

    .register-box h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    .register-box input,
    .register-box select {
      width: 100%;
      padding:8px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 15px;
      transition: border 0.3s ease;
    }

    .register-box input:focus,
    .register-box select:focus {
      border-color: #667eea;
      outline: none;
    }

    .register-box input[type="submit"]{
      width: 100%;
      padding: 12px;
      background-color: #667eea;
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .register-box input[type="submit"]:hover {
      background-color: #4954c2;
    }

    .footer {
      text-align: center;
      margin-top: 15px;
      font-size: 14px;
    }

    .footer a {
      color: #667eea;
      text-decoration: none;
    }

    .footer a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="register-box">
    <h2>Create Account</h2>
    <form action="#" method="POST">
      <input type="text" name="name" placeholder="Full Name" required>
      <input type="date" name="dob" require>
      <input type="email" name="email" placeholder="Email Address" required>
      <input type="tel" name="phone" placeholder="Phone Number" required>
      <select name="gender" required>
        <option value="">Select Gender</option>
        <option>Male</option>
        <option>Female</option>
        <option>Other</option>
      </select>
      <input type="text" name="address" placeholder="Enter Your City" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="password" name="confirm_password" placeholder="Confirm Password" required>
      <input type="submit" name="sbt" value="Register">
    </form>
    <div class="footer">
      Already have an account? <a href="login.php">Login here</a>
    </div>
  </div>

</body>
<script>
  <script>
    function validateForm() {
      const name = document.getElementById("name").value.trim();
      const email = document.getElementById("email").value.trim();
      const phone = document.getElementById("phone").value.trim();
      const gender = document.getElementById("gender").value;
      const password = document.getElementById("password").value;
      const confirmPassword = document.getElementById("confirmPassword").value;

      const emailRegex = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
      const phoneRegex = /^[0-9]{10,}$/;

      if (name === "") {
        alert("Please enter your full name.");
        return false;
      }

      if (!emailRegex.test(email)) {
        alert("Please enter a valid email address.");
        return false;
      }

      if (!phoneRegex.test(phone)) {
        alert("Please enter a valid phone number (at least 10 digits).");
        return false;
      }

      if (gender === "") {
        alert("Please select your gender.");
        return false;
      }

      if (password.length < 6) {
        alert("Password must be at least 6 characters long.");
        return false;
      }

      if (password !== confirmPassword) {
        alert("Passwords do not match.");
        return false;
      }

      alert("Form submitted successfully!");
      return true; // allow submission
    }
  </script>
</html>

<?php
if(isset($_REQUEST['sbt'])){
$servername = "localhost";
$username = "root";   
$password = "";      
$dbname = "hms";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$name=$_REQUEST['name'];
$email=$_REQUEST['email'];
$dob=$_REQUEST['dob'];
$phone=$_REQUEST['phone'];
$address=$_REQUEST['address'];
$gender=$_REQUEST['gender'];
$pass=$_REQUEST['password'];
$repass=$_REQUEST['confirm_password'];
if($pass===$repass){
  $user_id=rand(11111,99999);
  $sql="insert into patients(patient_id,name,dob,gender,phone,email,address)values('$user_id','$name','$dob','$gender','$phone','$email','$address')";
  mysqli_query($conn,$sql);
}

}
  ?>