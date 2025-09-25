<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>PharmaCare Dashboard</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', sans-serif;
    }

    body {
      display: flex;
      height: 100vh;
      background-color: #f1f3f6;
    }

    /* Sidebar */
    .sidebar {
      width: 220px;
      background-color: #1c2b39;
      color: white;
      display: flex;
      flex-direction: column;
      padding: 20px 15px;
    }

    .sidebar h2 {
      margin-bottom: 30px;
    }

    .sidebar a {
      text-decoration: none;
      color: #cfd8e3;
      margin: 10px 0;
      display: block;
      font-size: 10px;
    }

    .sidebar a:hover {
      color: white;
    }

    .sidebar .section-title {
      margin-top: 20px;
      margin-bottom: 5px;
      font-size: 13px;
      color: #6c7b8a;
    }

    /* Main Content */
    .main {
      flex: 1;
      padding: 20px;
    }

    /* Top Cards */
    .cards {
      display: flex;
      gap: 20px;
      margin-bottom: 30px;
    }

    .card {
      flex: 1;
      padding: 20px;
      border-radius: 6px;
      color: white;
    }

    .blue { background-color: #007bff; }
    .red { background-color: #dc3545; }
    .yellow { background-color: #ffc107; color: #000; }
    .green { background-color: #28a745; }

    .card h3 {
      font-size: 16px;
      margin-bottom: 10px;
    }

    .card p {
      font-size: 24px;
      font-weight: bold;
    }

    /* Table */
    table {
      width: 100%;
      border-collapse: collapse;
      background-color: white;
      border-radius: 6px;
      overflow: hidden;
    }

    th, td {
      padding: 12px 15px;
      text-align: left;
      border-bottom: 1px solid #f0f0f0;
    }

    th {
      background-color: #f8f9fa;
    }

    .status {
      padding: 4px 10px;
      border-radius: 4px;
      font-size: 12px;
      color: white;
      display: inline-block;
    }

    .in-stock {
      background-color: #28a745;
    }

    .out-stock {
      background-color: #dc3545;
    }

    .stock-bar {
      height: 8px;
      background-color: #e0e0e0;
      border-radius: 5px;
      overflow: hidden;
    }

    .stock-bar-fill {
      height: 100%;
      background-color: #28a745;
    }

    /* Stock Warnings */
    .warning-box {
      margin-top: 20px;
      background-color: #fff3cd;
      color: #856404;
      padding: 15px;
      border-radius: 6px;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <h2>PharmaCare</h2>
    <div>
      <div class="section-title">MAIN</div>
      <a href="#">Dashboard</a>

      <div class="section-title">INVENTORY</div>
      <a href="#">Add Medicine</a>
      <a href="#">Add Provider</a>
      <a href="#">Purchase Medicine</a>

      <div class="section-title">SALES</div>
      <a href="#">Selling History</a>
      <a href="#">Analytics</a>

      <div class="section-title">SETTINGS</div>
      <a href="#">Settings</a>
      <a href="#">Profile</a>
    </div>
  </div>

  <div class="main">
    <!-- Top Cards -->
    <div class="cards">
      <div class="card blue">
        <h3>Total Medicines</h3>
        <p>7</p>
      </div>
      <div class="card red">
        <h3>Out of Stock</h3>
        <p>1</p>
      </div>
      <div class="card yellow">
        <h3>Expired</h3>
        <p>0</p>
      </div>
      <div class="card green">
        <h3>In Stock Value</h3>
        <p>$1,120,050.00</p>
      </div>
    </div>

    <!-- Table -->
    <table>
      <thead>
        <tr>
          <th>Medicine Name</th>
          <th>Batch</th>
          <th>Quantity</th>
          <th>Expiry Date</th>
          <th>Status</th>
          <th>Price</th>
          <th>Stock Status</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Histacin</td>
          <td>351545AK4TU</td>
          <td>350</td>
          <td>2025-04-23</td>
          <td><span class="status in-stock">In Stock</span></td>
          <td>$450.00</td>
          <td><div class="stock-bar"><div class="stock-bar-fill" style="width: 85%"></div></div></td>
        </tr>
        <tr>
          <td>Azithromycin 500mg</td>
          <td>35154</td>
          <td>0</td>
          <td>2025-04-26</td>
          <td><span class="status out-stock">Stock Out</span></td>
          <td>$250.00</td>
          <td><div class="stock-bar"><div class="stock-bar-fill" style="width: 0%"></div></div></td>
        </tr>
        <tr>
          <td>Amoxicillin 500mg</td>
          <td>AMX240325A</td>
          <td>300</td>
          <td>2025-04-30</td>
          <td><span class="status in-stock">In Stock</span></td>
          <td>$450.00</td>
          <td><div class="stock-bar"><div class="stock-bar-fill" style="width: 70%"></div></div></td>
        </tr>
        <tr>
          <td>Paracetamol 500mg</td>
          <td>AMX240325B</td>
          <td>490</td>
          <td>2025-04-30</td>
          <td><span class="status in-stock">In Stock</span></td>
          <td>$500.00</td>
          <td><div class="stock-bar"><div class="stock-bar-fill" style="width: 90%"></div></div></td>
        </tr>
        <tr>
          <td>Tarmadol</td>
          <td>12354adafd</td>
          <td>43</td>
          <td>2025-04-30</td>
          <td><span class="status in-stock">In Stock</span></td>
          <td>$350.00</td>
          <td><div class="stock-bar"><div class="stock-bar-fill" style="width: 30%"></div></div></td>
        </tr>
        <tr>
          <td>algin</td>
          <td>352545</td>
          <td>150</td>
          <td>2025-04-30</td>
          <td><span class="status in-stock">In Stock</span></td>
          <td>$450.00</td>
          <td><div class="stock-bar"><div class="stock-bar-fill" style="width: 50%"></div></div></td>
        </tr>
        <tr>
          <td>Domperidone</td>
          <td>AMX240355A</td>
          <td>1000</td>
          <td>2026-04-22</td>
          <td><span class="status in-stock">In Stock</span></td>
          <td>$500.00</td>
          <td><div class="stock-bar"><div class="stock-bar-fill" style="width: 100%"></div></div></td>
        </tr>
      </tbody>
    </table>

    <!-- Warning Box -->
    <div class
