<?php
session_start();
$servername = "localhost";
$username = "root";   
$password = "";     
$dbname = "hms";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

    $appointments = [];
    $patient_id = $_SESSION['patient_id'];

    $sql = "SELECT a.appointment_id, p.name AS patient_name, p.phone, a.appointment_date, a.appointment_time, a.status, a.notes
            FROM appointments a
            JOIN patients p ON a.patient_id = p.patient_id
            WHERE a.patient_id = '$patient_id'
            ORDER BY a.appointment_date, a.appointment_time";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $appointments = $result->fetch_all(MYSQLI_ASSOC);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Patient Dashboard</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #eef2f7;
      margin: 0;
      padding: 0;
    }
    .container {
      width: 90%;
      margin: 40px auto;
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
    form {
      text-align: center;
      margin-bottom: 20px;
    }
    input[type="number"] {
      padding: 10px;
      width: 250px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
    }
    button {
      padding: 10px 20px;
      margin-left: 10px;
      border: none;
      background: #28a745;
      color: #fff;
      border-radius: 6px;
      font-size: 15px;
      cursor: pointer;
    }
    button:hover {
      background: #1e7e34;
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

  <div class="container">
    <h2>Patient Dashboard - Your Appointments</h2>
      <div class="header">
    <div class="logout"><a href="logout.php">Logout</a></div>
  </div>
      <?php if (!empty($appointments)) : ?>
        <table>
          <tr>
            <th>ID</th>
            <th>Doctor Name</th>
            <th>Phone</th>
            <th>Date</th>
            <th>Time</th>
            <th>Status</th>
            <th>Notes</th>
          </tr>
          <?php foreach ($appointments as $appt) : ?>
            <tr>
              <td><?= $appt['appointment_id'] ?></td>
              <td><?= $appt['patient_name'] ?></td>
              <td><?= $appt['phone'] ?></td>
              <td><?= $appt['appointment_date'] ?></td>
              <td><?= $appt['appointment_time'] ?></td>
              <td><?= $appt['status'] ?></td>
              <td><?= $appt['notes'] ?></td>
            </tr>
          <?php endforeach; ?>
        </table>
      <?php else : ?>
        <p class="no-data">❌ No appointments found for Doctor Name : <?= htmlspecialchars($_SESSION['name']) ?>.</p>
      <?php endif; ?>
  </div>
</body>
</html>
