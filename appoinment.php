<?php

$servername = "localhost";
$username = "root";   
$password = "";      
$dbname = "hms";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_id = $_POST['patient_id']; 
    $doctor_id = $_POST['doctor_id'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];
    $notes = $_POST['notes'];

    $sql = "INSERT INTO appointments (patient_id, doctor_id, appointment_date, appointment_time, notes)
            VALUES ('$patient_id', '$doctor_id', '$appointment_date', '$appointment_time', '$notes')";

    if ($conn->query($sql) === TRUE) {
        $success = "Appointment booked successfully!";
    } else {
        $error = "Error: " . $conn->error;
    }
}

$doctors = $conn->query("SELECT doctor_id, name FROM doctors");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Book Appointment</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #2fe7e7ff;
      margin: 0;
      padding: 0;
    }
    .container {
      width: 450px;
      margin: 60px auto;
      background: #d73cddff;
      padding: 25px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    .container:hover, .container:focus {
      border: 2px solid blue;
      outline: none;
      transform: translateY(-5px);
      background-color:#f0f0f0;
      box-shadow: 0 8px 20px rgba(246, 10, 18, 0.94);
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }
    label {
      font-weight: bold;
      margin-top: 10px;
      display: block;
    }
    input, select, textarea {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
    }
    button {
      width: 100%;
      padding: 12px;
      margin-top: 15px;
      border: none;
      background: #007bff;
      color: white;
      font-size: 16px;
      border-radius: 6px;
      cursor: pointer;
      transition: background 0.3s;
    }
    button:hover {
      background: #6af91ea4;
    }
    .message {
      text-align: center;
      margin-top: 15px;
      font-weight: bold;
    }
    .success { color: green; }
    .error { color: red; }
  </style>
</head>
<body>
  <div class="container">
    <h2>Book Doctor Appointment</h2>

    <?php if (!empty($success)) echo "<p class='message success'>$success</p>"; ?>
    <?php if (!empty($error)) echo "<p class='message error'>$error</p>"; ?>

    <form method="POST" action="">
      <label for="patient_id">Patient ID</label>
      <input type="number" name="patient_id" required>

      <label for="doctor_id">Choose Doctor</label>
      <select name="doctor_id" required>
        <option value="">-- Select Doctor --</option>
        <?php while($row = $doctors->fetch_assoc()) { ?>
          <option value="<?= $row['doctor_id']; ?>"><?= $row['name']; ?></option>
        <?php } ?>
      </select>

      <label for="appointment_date">Date</label>
      <input type="date" name="appointment_date" required>

      <label for="appointment_time">Time</label>
      <input type="time" name="appointment_time" required>

      <label for="notes">Notes</label>
      <textarea name="notes" rows="3"></textarea>

      <button type="submit">Book Appointment</button>
    </form>
  </div>
</body>
</html>
