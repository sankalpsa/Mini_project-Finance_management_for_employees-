<?php
include('configall.php');

$sql = "SELECT * FROM department;";
$result = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Department Data</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
    }
    .table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }
    .table th,
    .table td {
      padding: 10px;
      border: 1px solid #ccc;
    }
    .table th {
      background-color: #f2f2f2;
    }
    .action-btn {
      padding: 6px 12px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    .action-btn.delete {
      background-color: #f44336;
    }
  </style>
</head>
<body>
<div class="container">
  <h4>Department Data</h4>
  <a href="department-add.php" class="action-btn">Add Department <span class="w3-text-red">+</span></a>
  <table class="table">
    <tr>
      <th>Department ID</th>
      <th>Department Name</th>
      <th>Action</th>
    </tr>
    <?php while ($row = mysqli_fetch_array($result)) { ?>
      <tr>
        <td><?php echo $row['Depart_id']; ?></td>
        <td><?php echo $row['Depart_name']; ?></td>
        <td>
          <a href="dep-deletephp.php?del=<?php echo $row['Depart_id']; ?>" class="action-btn delete" onclick="return confirm('Are you sure you want to delete this department?')">Delete</a>
        </td>
      </tr>
    <?php } ?>
  </table>
</div>
</body>
</html>
