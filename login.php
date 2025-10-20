<?php
session_start();
include 'nav.php';
?>
<head>
  <title>Godwin Login</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }
    body {
      color: #d45fecff;
    }
    .container {
      display: flex;
      height: 80vh;
      width: 60%;
      margin: 40px auto;
      box-shadow: 0 4px 12px rgba(248, 4, 4, 0.93);
      border-radius: 10px 90px 10px 90px;
      overflow: hidden;
      background-color: #ffffff;
      border: 1px solid #ddd;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      transition: border 0.4s ease, 
      background-color 0.4s ease, 
      box-shadow 0.4s ease;
    }
     .container:hover, .container:focus {
    border: 2px solid blue;
    outline: none;
    transform: translateY(-5px);
    background-color:#f0f0f0;
    box-shadow: 0 8px 20px rgba(246, 10, 18, 0.94);
  }


   
    .left-panel {
      background-color: #1d3e75;
      color: #fff;
      width: 40%;
      padding: 40px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .left-panel h2 {
      margin-bottom: 30px;
      font-size: 24px;
    }

    .info-box {
      margin-bottom: 20px;
    }

    .info-box h4 {
      margin-bottom: 5px;
      font-size: 16px;
    }

    .info-box p {
      font-size: 14px;
      color: #cdd6f4;
    }

    .emergency {
      margin-top: auto;
      font-size: 15px;
      color: #f4f4f4;
    }

    .right-panel {
      background-color: #f0f0f0;
      width: 60%;
      padding: 60px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .right-panel h2 {
      font-size: 24px;
      color:red;
      margin-bottom: 10px;
    }

    .right-panel p {
      font-size: 14px;
      color: #666;
      margin-bottom: 30px;
    }

    .auth-form {
      display: flex;
      flex-direction: column;
    }

    .auth-form select,
    .auth-form input {
      padding: 12px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 14px;
    }

    .auth-form input[type="submit"] {
      padding: 12px;
      margin-left: auto;
      width: 40%;
      background-color: #317ed0ff;
      color: white;
      border: none;
      border-radius: 30px;
      font-weight: bold;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .auth-form input[type="submit"]:hover {
      background-color: #66ea0fff;
    }
    .extras {
      margin-top: 20px;
      display: flex;
      justify-content: space-between;
      font-size: 13px;
    }

    .extras a {
      color: #2e5aad;
      text-decoration: none;
    }
    .extras a:hover {
      text-decoration: underline;
    }
     footer {
            background-color: #5834cfff;
            text-align: center;
            padding: 20px;
            color: #f8f0f0ff;
            margin-top: 20px;
        }

        footer p {
            margin: 5px 0;
        }

        footer a {
            color: #fc1616d1;
            text-decoration: none;
            

        }


        footer a:hover {
            text-decoration: underline;
        }
  </style>
</head>
<body>
  <div class="container" tabindex="0">
    <!-- Left Panel -->
    <div class="left-panel">
      <h2>Godwin Specialized Hospital</h2>

      <div class="info-box">
        <h4>🔒 Secure Access Portal</h4>
        <p>256-bit SSL encrypted connection</p>
      </div>

      <div class="info-box">
        <h4>🕓 24/7 System Availability</h4>
        <p>Round-the-clock access guarantee</p>
      </div>

      <div class="info-box">
        <h4>🔁 24/7 System Availability</h4>
        <p>Round-the-clock access guarantee</p>
      </div>

      <div class="info-box">
        <h4>📱 OTP Verifications</h4>
        <p>Two Step OTP Verifications</p>
      </div>

      <div class="emergency">📞 Emergency: 24/7 Support Hotline</div>
    </div>

    <!-- Right Panel -->
    <div class="right-panel">
      <h2>Secure Authentication</h2>
      <p>Please verify your credentials to continue</p>

      <form class="auth-form" method="POST" action="">
        <select>
          <option>Doctor</option>
          <option>Nurse</option>
          <option>admin</option>
          <option>pactient</option>
        </select>

        <input type="text" name="username" placeholder="Enter Username ID" />
        <input type="password"name="password" placeholder="Confirm password" />

        <input type="submit" name="login" value="🔒Login" />

        <div class="extras">
          <a href="#">Need Assistance?</a>
          <a href="#">Password Recovery</a>
        </div>
      </form>
    </div>
  </div>
   <footer>
        <p>&copy; 2025 Godwin Medical College Hospital. All rights reserved.</p>
        <p>Designed by <a href="#">Godwin Web Team</a></p>
    </footer>

</body>
</html>

<?php
if (isset($_REQUEST['login'])) {
    include "database.php";
    $db = new Database();
    $conn = $db->connect();

    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];




    // Prepared statement for secure query
    $stmt = $conn->prepare("SELECT doctor_id,name, password FROM doctors WHERE doctor_id = ?");
    $stmt->bind_param("i", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        if ($password==$row['password']) {
            // Password is correct, start session and redirect
            $_SESSION['name'] = $row['name'];
            $_SESSION['doctor_id'] = $row['doctor_id'];

    
            echo "<script>window.location='checkstatus.php'</script>";
            exit();

        } else {
            echo "<script>alert('Invalid Password')</script>";
        }
    } else {
        echo "<script>alert('Invalid Username or User ID')</script>";
    }

    $stmt->close();
}
?>
