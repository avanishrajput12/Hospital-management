<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial,sans-serif;
        }
        body{
            background: #fff;
            color:#333
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
  0% { background-position: 0% 50%; }
  100% { background-position: 100% 50%; }
}


p{
    color:white;
}

       

        .hero-img{
            height:50vh;
        }

        .hero{
            background-image: url("https://previews.123rf.com/images/279photo/279photo1612/279photo161204550/68032363-concept-of-appointment-to-doctor-online-top-view-on-wooden-background.jpg");
            height: 100vh;
            display: flex;
            align-items: center;
        }

        .btn{
            padding: 10px 10px;
            margin: 10px 10px;
            background-color: #20e020ff;
            font-weight: 1000;
            font-size: 1.3em;
            color: #f7faf6f8;
            border-radius: 30px;
        }

        .btn:hover{
            color: #6523ED;
            background: none;
            background-color: #edfece
        }



        .h3{
            padding: 0px;
        }

        /* Footer styling */
        footer {
            background-color: #6e22e9ff;
            text-align: center;
            padding: 20px;
            color: #333;
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

    <section class="hero">
        <div class="hero-text">
            <h1>Godwin Specialized <br>
            Medical College Hospital </h1>
            <p>We Provided the Best Healthcare for You And Your Family.</p>
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
