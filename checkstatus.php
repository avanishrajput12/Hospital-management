<?php
session_start();

// Check if doctor is logged in
if (!isset($_SESSION['doctor_id'])) {
    header("Location: doctor_login.php"); // redirect if not logged in
    exit();
}

$doctor_id = $_SESSION['doctor_id'];

// Database connection
$servername = "localhost";
$username = "root";   // your DB username
$password = "";       // your DB password
$dbname = "hms";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch doctor info
$doctor = $conn->query("SELECT name FROM doctors WHERE doctor_id = '$doctor_id'")->fetch_assoc();

// Fetch appointments
$sql = "SELECT a.appointment_id, p.name AS patient_name, p.phone, a.appointment_date, a.appointment_time, a.status, a.notes
        FROM appointments a
        JOIN patients p ON a.patient_id = p.patient_id
        WHERE a.doctor_id = '$doctor_id'
        ORDER BY a.appointment_date, a.appointment_time";

$result = $conn->query($sql);
$appointments = $result->num_rows > 0 ? $result->fetch_all(MYSQLI_ASSOC) : [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Doctor Dashboard</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #eef2f7;
      margin: 0;
      padding: 0;
    }
    .header {
      background: #28a745;
      color: #fff;
      padding: 15px;
      text-align: center;
      font-size: 20px;
      font-weight: bold;
    }
    .container {
      width: 90%;
      margin: 30px auto;
      background: #fff;
      padding: 25px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      color: #222;
      margin-bottom: 20px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 12px;
      text-align: center;
    }
    th {
      background: #28a745;
      color: #fff;
    }
    tr:nth-child(even) {
      background: #f9f9f9;
    }
    .no-data {
      text-align: center;
      color: red;
      font-weight: bold;
      margin-top: 15px;
    }
    .logout {
      display: block;
      text-align: right;
      margin: 10px 20px;
    }
    .logout a {
      color: #fff;
      background: #dc3545;
      padding: 8px 15px;
      border-radius: 6px;
      text-decoration: none;
      font-size: 14px;
    }
    .logout a:hover {
      background: #c82333;
    }
  </style>
</head>
<body>
  <div class="header">
    Welcome, Dr. <?= htmlspecialchars($doctor['name']) ?> 👨‍⚕️
    <div class="logout"><a href="logout.php">Logout</a></div>
  </div>

  <div class="container">
    <h2>Your Appointments</h2>

    <?php if (!empty($appointments)) : ?>
      <table>
        <tr>
          <th>ID</th>
          <th>Patient Name</th>
          <th>Phone</th>
          <th>Date</th>
          <th>Time</th>
          <th>Status</th>
          <th>Notes</th>
        </tr>
        <?php foreach ($appointments as $appt) : ?>
          <tr>
            <td><?= $appt['appointment_id'] ?></td>
            <td><?= htmlspecialchars($appt['patient_name']) ?></td>
            <td><?= htmlspecialchars($appt['phone']) ?></td>
            <td><?= $appt['appointment_date'] ?></td>
            <td><?= $appt['appointment_time'] ?></td>
            <td><?= $appt['status'] ?></td>
            <td><?= htmlspecialchars($appt['notes']) ?></td>
          </tr>
        <?php endforeach; ?>
      </table>
    <?php else : ?>
      <p class="no-data">❌ No appointments found.</p>
    <?php endif; ?>
  </div>
</body>
</html>
