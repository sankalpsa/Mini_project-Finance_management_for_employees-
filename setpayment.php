<?php
include('configall.php');

if (isset($_POST["submit"])) {
  $absence = $_POST["absence"];
  $loan_cut = 0;
  $pfund_cut = 0;
  $overtime = $_POST["overtime"];
  $sbonus = $_POST["sbonus"];
  $medi_allow = 0;
  $house_allow = 0;
  $month = $_POST["month"];
  $year = $_POST["year"];
  $empid = $_POST["empid"];
  $obonus = $_POST["obonus"];
  $total = 0;

  $sql = "SELECT * FROM employee INNER JOIN job ON employee.jobtitle = job.Job_Title WHERE employee.Employee_id = ?";
  $stmt = $connection->prepare($sql);
  $stmt->bind_param("i", $empid);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  $name = $row['Name'];
  $job = $row['jobtitle'];
  $medi_allow = $row['basic_salary'] * 0.03;
  $house_allow = $row['basic_salary'] * 0.08;
  $loan_cut = $row['loan'] * 0.05;
  $up_loan = $row['loan'] - $loan_cut;
  $pfund_cut = $row['basic_salary'] * 0.025;
  $gain = $overtime * 300 + $sbonus + $obonus + $row['basic_salary'] + $medi_allow + $house_allow;
  $cut = $loan_cut + $absence * 200 + $pfund_cut;
  $total = $gain - $cut;
  $up_fund = $row['p_fund'] + $pfund_cut;

  $sql3 = "SELECT MAX(pay_no) AS payid FROM payment";
  $result3 = $connection->query($sql3);
  $row3 = $result3->fetch_assoc();
  $payid = $row3['payid'] + 1;

  $sql2 = "INSERT INTO payment (pay_no, emp_id, year, month, absence, loan_cut, pfund_cut, overtime, season_bonus, other_bonus, medi_allow, house_allow, total_pay) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
  $stmt2 = $connection->prepare($sql2);
  $stmt2->bind_param("iissiiiiiiiii", $payid, $empid, $year, $month, $absence, $loan_cut, $pfund_cut, $overtime, $sbonus, $obonus, $medi_allow, $house_allow, $total);

  $sql_uploan = "UPDATE employee SET loan = ?, p_fund = ? WHERE Employee_id = ?";
  $stmt_uploan = $connection->prepare($sql_uploan);
  $stmt_uploan->bind_param("dis", $up_loan, $up_fund, $empid);

  if ($stmt2->execute() && $stmt_uploan->execute()) {
    echo 'Successfully inserted payment data';
    header('Location: employee.php');
  } else {
    echo 'Failed to insert payment data';
  }

  $stmt->close();
  $stmt2->close();
  $stmt_uploan->close();
}

$connection->close();
?>
