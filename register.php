<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="assest/registercss.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Page</title>

  <style>
    .otp-button, .verify-button {
      background-color: #007BFF;
      border: none;
      color: white;
      padding: 10px 16px;
      font-size: 14px;
      border-radius: 5px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .otp-button:hover, .verify-button:hover {
      background-color: #0056b3;
    }

    .otp-button:disabled, .verify-button:disabled {
      background-color: #6c757d;
      cursor: not-allowed;
    }

    .spinner {
      border: 2px solid #f3f3f3;
      border-top: 2px solid white;
      border-radius: 50%;
      width: 14px;
      height: 14px;
      animation: spin 0.8s linear infinite;
      display: inline-block;
      margin-left: 8px;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    .otp-group input {
      width: 100%;
      padding: 10px;
      border-radius: 4px;
      border: 1px solid #ccc;
      margin-bottom: 8px;
    }

    .otp-group {
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <?php include 'nav.php'; ?>

  <div class="register-container">
    <h2>Create Account</h2>
    <form class="register-form" method="POST" action="" onsubmit="return checkOtpVerified();">
      <input type="text" name="username" placeholder="Full Name" required>
      <input type="tel" name="number" placeholder="Phone Number" required>
      <input type="date" name="dob" placeholder="Enter your date of birth" required>

      <select name="gender" id="gender" required>
        <option value="">--Select Gender--</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Other">Other</option>
      </select>


      <div class="email-row" style="display: flex; gap: 10px; align-items: center; flex-wrap: wrap;">
        <input type="email" name="email" id="email" placeholder="Email Address" required style="flex: 1; min-width: 200px;">
        <button type="button" class="otp-button" id="getotp" onclick="sendOTP()" style="margin-top: -16px;">Get OTP</button>
      </div>

      <div class="otp-group" id="otpSection" style="display: none;">
        <input type="text" id="otp" name="otp" placeholder="Enter OTP" maxlength="6" required />
        <button type="button" class="verify-button" id="verifyBtn" onclick="verifyOTP()">Verify OTP</button>
        <div id="otpStatus" style="font-size: 14px;"></div>
      </div>

      <input type="password" name="pass" placeholder="Password" required>
      <input type="password" name="repass" placeholder="Re-enter Password" required>
      <input type="hidden" name="otp_verified" id="otp_verified" value="0">
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

  <script>
    function sendOTP() {
      const getOtpBtn = document.getElementById('getotp');
      const email = document.getElementById('email').value;

      if (!email) {
        alert("Please enter your email first.");
        return;
      }

      getOtpBtn.disabled = true;
      getOtpBtn.innerHTML = 'Sending... <span class="spinner"></span>';

      // Simulate AJAX delay - replace this with real AJAX
      setTimeout(() => {
        document.getElementById('otpSection').style.display = 'block';
        document.getElementById('otpStatus').innerText = "OTP sent to your email.";
        document.getElementById('otpStatus').style.color = "black";
        getOtpBtn.disabled = false;
        getOtpBtn.innerHTML = 'Resend OTP';
      }, 1500);
    }

    function verifyOTP() {
      const verifyBtn = document.getElementById('verifyBtn');
      const otp = document.getElementById('otp').value;

      if (otp.length !== 6) {
        alert("Please enter a 6-digit OTP.");
        return;
      }

      verifyBtn.disabled = true;
      verifyBtn.innerHTML = 'Verifying... <span class="spinner"></span>';

      // Simulate verification delay
      setTimeout(() => {
        if (otp === "123456") { // Replace this check with real backend logic
          document.getElementById('otp_verified').value = "1";
          document.getElementById('otpStatus').innerText = "OTP Verified ✅";
          document.getElementById('otpStatus').style.color = "green";
        } else {
          document.getElementById('otp_verified').value = "0";
          document.getElementById('otpStatus').innerText = "Invalid OTP ❌";
          document.getElementById('otpStatus').style.color = "red";
        }
        verifyBtn.disabled = false;
        verifyBtn.innerHTML = 'Verify OTP';
      }, 1500);
    }

    function checkOtpVerified() {
      if (document.getElementById('otp_verified').value !== "1") {
        alert("Please verify the OTP before submitting the form.");
        return false;
      }
      return true;
    }
  </script>
</body>
</html>

<?php
if(isset($_REQUEST['sbt'])){
  include "database.php";
  $db = new Database();
  $conn = $db->connect(); 

  $name = $_REQUEST['username'];
  $number = $_REQUEST['number'];
  $email = $_REQUEST['email'];
  $pass = $_REQUEST['pass'];
  $repass = $_REQUEST['repass'];

  if($pass == $repass){
    $hashed = password_hash($pass, PASSWORD_DEFAULT);
    $sid = rand(1000, 9999);
    $sql = "INSERT INTO username(user_id, username, phone, email, password) 
            VALUES ('$sid', '$name', '$number', '$email', '$hashed')";
    $result = mysqli_query($conn, $sql);
    
    if($result){
      echo "<script>alert('Registration Successful')</script>";
      echo "<script>window.location='login.php'</script>";
    } else {
      echo "<script>alert('Registration Failed')</script>";
    }
  } else {
    echo "<script>alert('Password Not Matched')</script>";
  }
}
?>
