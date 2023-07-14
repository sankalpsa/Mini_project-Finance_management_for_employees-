<?php
include('configall.php');

$empid = $_POST['empid']; // Assuming you're retrieving the employee ID from a form

$sql = "DELETE FROM `employee` WHERE Employee_id='$empid';";

if ($connection->query($sql) === TRUE) {
  echo "Record deleted successfully.";
} else {
  echo "Error deleting record: " . $connection->error;
}

$connection->close();
?>
