<?php
session_start();
?>
<head>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #a3a0a0ff;
            margin: 0;
            align-items: center;
            justify-content: center;

            padding: 20px;
        }
        container{
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
        }
        h1 {
            color: #333;
        }
        a {
            color: #007BFF;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
</head>
<body>
<div class="container" tabindex="0">
    <h1>Welcome <?php echo $_SESSION['username']; ?></h1>
    <p>hello, my name is avanish rajput</p>
    <p><a href="logout.php">Logout</a></p>
</div>


    
</body>
</html>


    