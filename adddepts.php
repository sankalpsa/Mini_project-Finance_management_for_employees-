<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Include the database configuration file
  require('configall.php');
  
  // Get the department ID and name from the form
  $depid = $_POST["depid"];
  $depname = $_POST["depname"];
  
  // Prepare the SQL statement
  $sql = "INSERT INTO department (Depart_id, Depart_name) VALUES (?, ?)";
  $stmt = mysqli_prepare($connection, $sql);
  
  // Bind the parameters and execute the statement
  mysqli_stmt_bind_param($stmt, "is", $depid, $depname);
  $result = mysqli_stmt_execute($stmt);
  
  if ($result) {
    // Redirect to the department.php page
    header('Location: department.php');
    exit();
  } else {
    // Display an error message
    echo "Something went wrong. Please try again.";
  }
  
  // Close the statement and the database connection
  mysqli_stmt_close($stmt);
  mysqli_close($connection);
}
?>
