<?php
include('configall.php');

$empid = $_POST["empid"];
$name = $_POST["name"];
$dob = $_POST["dob"];
$gender = $_POST["gender"];
$sdate = $_POST["sdate"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$loan = 0;
$pfund = 0;
$jobtitle = $_POST["jobtitle"];
$address = $_POST["address"];
$depid = $_POST["depid"];
$manid = $_POST["managedepid"];
$bacc = $_POST["bacc"];

if ($manid == 0) {
  $sql = "INSERT INTO employee VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
  $stmt = $connection->prepare($sql);
  $stmt->bind_param("isssssssssisi", $empid, $name, $address, $phone, $email, $sdate, $dob, $gender, $loan, $pfund, $jobtitle, $depid, $bacc);
} else {
  $sql = "INSERT INTO employee VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
  $stmt = $connection->prepare($sql);
  $stmt->bind_param("isssssssssisisi", $empid, $name, $address, $phone, $email, $sdate, $dob, $gender, $loan, $pfund, $jobtitle, $depid, $manid, $bacc);
}

if ($stmt->execute()) {
  echo "Successfully inserted into the database";
  header('Location: employee.php');
} else {
  echo "Something went wrong";
}

$stmt->close();
$connection->close();
?>
