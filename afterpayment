<!DOCTYPE html>
<html>
<head>
  <title>Payment History</title>
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
    <?php
    include('configall.php');
    $id = isset($_POST['id']) ? $_POST['id'] : '';

    if ($id) {
      $sql = "SELECT payment.year, payment.month, payment.pay_no, payment.emp_id, employee.Name, employee.bank_accno, payment.total_pay 
              FROM employee 
              INNER JOIN payment 
              ON employee.Employee_id = payment.emp_id 
              WHERE employee.Employee_id = $id";
      $result = mysqli_query($connection, $sql);

      if (mysqli_num_rows($result) > 0) {
        echo '<table>';
        echo '<tr>';
        echo '<th>Payment No</th>';
        echo '<th>Year</th>';
        echo '<th>Month</th>';
        echo '<th>Bank Account No</th>';
        echo '<th>Total Salary</th>';
        echo '</tr>';

        while ($row = mysqli_fetch_array($result)) {
          echo '<tr>';
          echo '<td>' . $row['pay_no'] . '</td>';
          echo '<td>' . $row['year'] . '</td>';
          echo '<td>' . $row['month'] . '</td>';
          echo '<td>' . $row['bank_accno'] . '</td>';
          echo '<td>' . $row['total_pay'] . '</td>';
          echo '</tr>';
        }

        echo '</table>';
      } else {
        echo '<p>No payment history found for the specified employee ID.</p>';
      }

      mysqli_free_result($result);
    } else {
      echo '<p>No employee ID provided.</p>';
    }
    ?>
  </div>
</body>
</html>
