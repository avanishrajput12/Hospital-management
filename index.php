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

       

        .hero-img{
            height:50vh;
        }

        .hero{
            background-image: url("https://static.vecteezy.com/system/resources/previews/026/375/249/non_2x/ai-generative-portrait-of-confident-male-doctor-in-white-coat-and-stethoscope-standing-with-arms-crossed-and-looking-at-camera-photo.jpg");
            height: 60vh;
            display: flex;
            align-items: center;
        }

        .btn{
            padding: 10px 20px;
            background-image: radial-gradient(#6523ED, blue);
            font-weight: 1000;
            font-size: 1.3em;
            color: #edfece;
            border-radius: 30px;
        }

        .btn:hover{
            color: #6523ED;
            background: none;
            background-color: #edfece
        }

        .details{
            background-image: url("https://img.freepik.com/free-photo/beautiful-young-female-doctor-looking-camera-office_1301-7807.jpg?semt=ais_incoming&w=740&q=80");
            height:60vh;
            width: 80;
            align-items: center;
            background-repeat: no-repeat;
        }

        .h3{
            padding: 0px;
        }

        /* Footer styling */
        footer {
            background-color: #8be1ee;
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
        
    </section>
    <section class="details">
        <h3>Dr.Hazel Sharma(Heart Surgury Specialist)</h3>
    </section>

    <footer>
        <p>&copy; 2025 Godwin Medical College Hospital. All rights reserved.</p>
        <p>Designed by <a href="#">Godwin Web Team</a></p>
    </footer>

</body>
</html>
