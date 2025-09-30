<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Godwin Medical College Hospital</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      background: #fff;
      color: #333;
    }

    h1 {
      font-size: 3rem;
      font-weight: bold;
      background: linear-gradient(90deg, red, orange, yellow, green, blue, indigo, violet);
      background-size: 400% 100%;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      animation: rainbowMove 5s linear infinite;
    }

    @keyframes rainbowMove {
      0% {
        background-position: 0% 50%;
      }
      100% {
        background-position: 100% 50%;
      }
    }

    .hero {
      background-image: url("https://img.freepik.com/free-photo/arrangement-medical-still-life-elements_23-2148854099.jpg?semt=ais_hybrid&w=740&q=80");
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 0 20px;
    }

    .hero-text {
      text-align: center;
      background-color: rgba(235, 52, 225, 0.6);
      padding: 30px;
      border-radius: 10px;
      color: white;
      max-width: 700px;
      box-shadow: 0 4px 15px rgba(238, 23, 23, 0.94);
    }

    .hero-text p {
      margin-top: 10px;
      font-size: 1.2rem;
    }

    .btn {
      padding: 10px 20px;
      margin: 15px 10px;
      background-color: #20e020ff;
      font-weight: 700;
      font-size: 1.1em;
      color: white;
      border: none;
      border-radius: 30px;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .btn:hover {
      background-color: #edfece;
      color: #6523ed;
    }

    footer {
      background-color: #6e22e9ff;
      text-align: center;
      padding: 20px;
      color: #fff;
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

  <section class="hero">
    <div class="hero-text">
      <h1>Godwin Specialized <br> Medical College Hospital</h1>
      <p>We Provide the Best Healthcare for You and Your Family.</p>
      <button class="btn" onclick="window.location.href='checkstatus.php'">Check Appointment</button>
      <button class="btn" onclick="window.location.href='appoinment.php'">Appointment</button>
    </div>
  </section>

  <footer>
    <p>&copy; 2025 Godwin Medical College Hospital. All rights reserved.</p>
    <p>Designed by <a href="#">Godwin Web Team</a></p>
  </footer>

</body>
</html>
