<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Page</title>
  <style>
    /* Your existing CSS */
     * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }

    body {
     background-color: hsl(130, 45%, 58%);  
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

    select, input {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-bottom: 10px;
    }
    .email-row {
      display: flex; /* Ensure flex behavior */
      gap: 10px;
      align-items: center;
      margin-bottom: 15px; /* Add margin below the email row */
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

  <form class="register-form" method="POST" action="register.php">
  <input type="text" name="username" placeholder="Full Name" required>
  <input type="tel" name="number" placeholder="Phone Number" required>
  <input type="date" name="dob" placeholder="Enter your date of birth" required>

  <select name="gender" id="gender" required>
    <option value="">--Select Gender--</option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
    <option value="Other">Other</option>
  </select>

  <!-- Email + Get OTP -->
  <div class="email-row">
    <input type="email" name="email" id="email" placeholder="Email Address" required style="flex: 1;">
    <button type="button" id="getotp" style="padding: 8px 1px; cursor: pointer;">Get OTP</button>
  </div>

  <!-- OTP field (hidden by default) -->
  <div id="otp-container" style="display: none;">
    <input type="text" name="otp" id="verifyotp" placeholder="Enter OTP" required>
  </div>

  <input type="password" name="pass" placeholder="Password" required>
  <input type="password" name="repass" placeholder="Re-enter Password" required>
  <input type="submit" name="sbt" value="Register">
</form>

  <footer>
        <p>&copy; 2025 Godwin Medical College Hospital. All rights reserved.</p>
        <p>Designed by <a href="#">Godwin Web Team</a></p>
    </footer>

</body>
<script>
document.getElementById("getotp").addEventListener("click", function () {
    let email = document.getElementById("email").value;

    if (email === "") {
        alert("Please enter your email first");
        return;
    }

    // Send email to mail.php using fetch
    fetch("mail.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "email=" + encodeURIComponent(email)
    })
    .then(response => response.text())
    .then(data => {
        alert(data); // Shows success or error message from mail.php
        document.getElementById("otp-container").style.display = "block"; // Show OTP field
    })
    .catch(error => {
        console.error("Error:", error);
    });
});
</script>




</html>
<?php
session_start();

if (isset($_POST['sbt'])) {
    include "database.php";
    $db = new Database();
    $conn = $db->connect(); 

    $name   = $_POST['username'];
    $number = $_POST['number'];
    $dob    = $_POST['dob'];
    $gender = $_POST['gender'];
    $email  = $_POST['email'];
    $pass   = $_POST['pass'];
    $repass = $_POST['repass'];
    $userOtp = $_POST['otp'];

    // Verify OTP
    //$_SESSION['otp']) ||
    if (!isset($userOtp)!= $_SESSION['otp']) {
        echo "<script>alert('Invalid OTP! Please try again.')</script>";
        exit;
    }

    if ($pass == $repass) {
        $hashed = password_hash($pass, PASSWORD_DEFAULT);
        $sid = rand(1000, 9999);

        $sql = "INSERT INTO username(user_id, username, phone, dob, gender, email, password) 
                VALUES ('$sid', '$name', '$number', '$dob', '$gender', '$email', '$hashed')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "<script>alert('Registration Successful')</script>";
            echo "<script>window.location='login.php'</script>";
        } else {
            echo "<script>alert('Registration Failed')</script>";
        }
    } else {
        echo "<script>alert('Passwords do not match')</script>";
    }
}
?>

