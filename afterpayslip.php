<!DOCTYPE html>
<html>
<head>
  <title>Employee Data</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 50px;
    }
    h4 {
      margin-bottom: 20px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    .form-group {
      margin-bottom: 20px;
    }
    .form-label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }
    .form-select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 16px;
    }
    .submit-btn {
      display: block;
      width: 100%;
      padding: 12px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }
    .submit-btn:hover {
      background-color: #45a049;
    }
    @media only screen and (max-width: 600px) {
      .container {
        padding: 30px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h4>Employee Data</h4>
    <form class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <div class="form-group">
        <label class="form-label" for="month">Month</label>
        <select class="form-select" name="month" id="month" required>
          <option value="">Select Month</option>
          <option value="January">January</option>
          <option value="February">February</option>
          <option value="March">March</option>
          <option value="April">April</option>
          <option value="May">May</option>
          <option value="June">June</option>
          <option value="July">July</option>
          <option value="August">August</option>
          <option value="September">September</option>
          <option value="October">October</option>
          <option value="November">November</option>
          <option value="December">December</option>
        </select>
      </div>
      <div class="form-group">
        <label class="form-label" for="year">Year</label>
        <select class="form-select" name="year" id="year" required>
          <option value="">Select Year</option>
          <option value="2021">2021</option>
          <option value="2022">2022</option>
          <option value="2023">2023</option>
          <!-- Add more years as needed -->
        </select>
      </div>
      <input type="submit" value="Submit" class="submit-btn">
    </form>

    <?php
    include('configall.php');
    $month = isset($_POST['month']) ? $_POST['month'] : '';
    $year = isset($_POST['year']) ? $_POST['year'] : '';

    if ($month && $year) {
      $sql = "SELECT payment.pay_no, payment.emp_id, employee.Name, employee.bank_accno, payment.total_pay
              FROM employee
              INNER JOIN payment
              ON employee.Employee_id = payment.emp_id
              WHERE payment.month = '$month' AND payment.year = '$year'";
      $result = mysqli_query($connection, $sql);

      if (mysqli_num_rows($result) > 0) {
        echo '<table>';
        echo '<tr>';
        echo '<th>Payment No</th>';
        echo '<th>Employee ID</th>';
        echo '<th>Name</th>';
        echo '<th>Bank Account No</th>';
        echo '<th>Total Salary</th>';
        echo '</tr>';

        while ($row = mysqli_fetch_array($result)) {
          echo '<tr>';
          echo '<td>' . $row['pay_no'] . '</td>';
          echo '<td>' . $row['emp_id'] . '</td>';
          echo '<td>' . $row['Name'] . '</td>';
          echo '<td>' . $row['bank_accno'] . '</td>';
          echo '<td>' . $row['total_pay'] . '</td>';
          echo '</tr>';
        }

        echo '</table>';
      } else {
        echo '<p>No employee data found for the specified month and year.</p>';
      }

      mysqli_free_result($result);
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
      echo '<p>Please select a month and year to fetch employee data.</p>';
    }
    ?>
  </div>
</body>
</html>
