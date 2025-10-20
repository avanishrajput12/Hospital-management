<head>
  <title>Light / Dark Mode</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
      transition: background 0.3s, color 0.3s;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 60px;
      background: #5834cf;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      position: sticky;
      top: 0;
      z-index: 100;
    }

    .logo-container {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .logo-container img {
      height: 50px;
    }

    .logo-container h2 {
      color: #c0cac9e1;
      font-size: 26px;
    }

    nav ul {
      list-style: none;
      display: flex;
      gap: 25px;
    }

    nav ul li a {
      text-decoration: none;
      color: white;
      font-weight: 500;
      transition: color 0.3s;
    }

    nav ul li a:hover {
      color: red;
    }

    /* Dark mode styles */
    body.dark {
      background: #121212;
      color: #f0f0f0;
    }

    body.dark header {
      background: #333;
    }
    body.light{
            background-color: white;
        }
    body.dark{
            background-color: black;
        }
     #sbt{
            padding: 15px;
            border-radius: 30px;
            background-color: black;
            transition: background-color 1s;
        }
  </style>
</head>
<body>

<header>
  <div class="logo-container">
    <img src="assest/logo.png" alt="Logo">
    <h2>Godwin</h2>
  </div>
  <nav>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">Online Report</a></li>
      <li><a href="contact.php">Contact</a></li>
      <li><a href="login.php">Login Panel</a></li>
      <li><a href="register.php">Apply Now</a></li>
    </ul>
  </nav>
  <button id="sbt">🌙</button>
</header>

<script>
 $(document).ready(function(){
$('#sbt').on("click",function(){
            $('body').toggleClass("light dark")
            if($('body').hasClass('light')){
                $(this).text('🌞');
                $(this).css("background-color","yellow");
            }else{
                $(this).text('🌙')
                $(this).css("background-color","Black");
            }
        })

      });

</script>
</body>
