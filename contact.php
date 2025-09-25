<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Contact Us</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background: #e9f7fc;
    }

    /* Wrapper for main content */
    .main-content {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 40px 20px;
      min-height: calc(100vh - 80px); /* Adjust for nav height */
    }

    .contact-container {
      background-color: #00d6e0;
      width: 90%;
      max-width: 900px;
      display: flex;
      border-radius: 15px;
      padding: 30px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      gap: 30px;
      flex-wrap: wrap;
    }

    .contact-form {
      flex: 1 1 300px;
      display: flex;
      flex-direction: column;
    }

    .contact-form h2 {
      color: #002e42;
      margin-bottom: 10px;
      font-size: 24px;
    }

    .contact-form p {
      color: #004c5c;
      font-size: 14px;
      margin-bottom: 20px;
    }

    .contact-form input,
    .contact-form textarea {
      margin-bottom: 15px;
      padding: 10px;
      border: none;
      border-radius: 5px;
      font-size: 14px;
    }

    .contact-form textarea {
      resize: none;
      height: 100px;
    }

    .contact-form button {
      padding: 10px;
      background-color: #00336e;
      color: white;
      border: none;
      border-radius: 5px;
      font-weight: bold;
      cursor: pointer;
    }

    .contact-form button:hover {
      background-color: #0051a8;
    }

    .contact-info {
      background: white;
      border-radius: 10px;
      padding: 20px;
      flex: 1 1 300px;
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .contact-info h3 {
      margin-bottom: 5px;
      color: #003366;
    }

    .contact-info p {
      margin: 0;
      color: #555;
    }

    .contact-info i {
      margin-right: 8px;
      color: #007BFF;
    }

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

  <!-- ✅ Navbar inside <body> -->
  <?php include 'nav.php'; ?>

  <!-- ✅ Centered content below nav -->
  <div class="main-content">
    <div class="contact-container">

      <!-- Left Form -->
      <div class="contact-form">
        <h2>Contact Us</h2>
        <p>We're here to help and answer any question you might have.</p>
        <input type="text" placeholder="Your Name">
        <input type="email" placeholder="Your Email">
        <input type="text" placeholder="Subject">
        <textarea placeholder="Your Message"></textarea>
        <button>Send Message</button>
      </div>

      <!-- Right Info -->
      <div class="contact-info">
        <div>
          <h3>Our Address</h3>
          <p><i>📍</i>123 Hospital Street, Medical City, Health Country</p>
        </div>
        <div>
          <h3>Call Us</h3>
          <p><i>📞</i>+91 1234 567890</p>
        </div>
        <div>
          <h3>Email Us</h3>
          <p><i>📧</i>avanishrajput@gmail.com</p>
        </div>
        <div>
          <h3>Telegram</h3>
          <p><i>💬</i>@godwinhospital</p>
        </div>
      </div>

    </div>
  </div>


  <footer>
        <p>&copy; 2025 Godwin Medical College Hospital. All rights reserved.</p>
        <p>Designed by <a href="#">Godwin Web Team</a></p>
    </footer>

</body>
</html>
