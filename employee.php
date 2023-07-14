<?php include('configall.php')?>
<!DOCTYPE html>
<html>
<head>
  <title>Employee Data</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f7f9fb;
    }
    .container {
      padding-top: 20px;
    }
    .btn-add {
      margin-bottom: 10px;
    }
    .table-responsive {
      margin-top: 20px;
    }
    .table th {
      background-color: #e9ecef;
      text-align: center;
    }
    .table td {
      text-align: center;
    }
    .btn-edit {
      background-color: #3498db;
      border-color: #3498db;
    }
    .btn-edit:hover {
      background-color: #217dbb;
      border-color: #217dbb;
    }
    .btn-delete {
      background-color: #e74c3c;
      border-color: #e74c3c;
    }
    .btn-delete:hover {
      background-color: #c0392b;
      border-color: #c0392b;
    }
    .table-row {
      cursor: pointer;
    }
  </style>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function(){
      $(".table-row").click(function(){
        var tableId = $(this).data("target");
        $(tableId).collapse("toggle");
      });
    });
  </script>
</head>
<body>
<div class="container">
<h4>Employee Data</h4>
<a href="employee-add.php" class="btn btn-primary btn-add">Add Employee <span class="glyphicon glyphicon-plus"></span></a>
<div class="table-responsive">
<table class="table table-bordered">
<thead>
<tr>
<th>Employee ID</th>
<th>Name</th>
<th>Address</th>
<th>Email</th>
<th>Phone Number</th>
<th>Gender</th>
<th>Job Title</th>
<th>Salary</th>
<th>Loan</th>
<th>Provident Fund</th>
<th>Bank Number</th>
<th>Start Date</th>
<th>Date of Birth</th>
<th>Department</th>
<th>Managing Department</th>
<th colspan="2">Action</th>
</tr>
</thead>
<tbody>
<?php $sql="SELECT employee.*,job.basic_salary FROM employee INNER JOIN job ON employee.jobtitle=job.Job_Title;";
$result=mysqli_query($connection,$sql);
while($row=mysqli_fetch_array($result)) {?>
<tr class="table-row" data-target="#collapse-<?php echo $row['Employee_id']; ?>" data-toggle="collapse">
<td><?php echo $row['Employee_id']; ?></td>
<td><?php echo $row['Name']; ?></td>
<td><?php echo $row['Address']; ?></td>
<td><?php echo $row['Email']; ?></td>
<td><?php echo $row['Phone_no']; ?></td>
<td><?php echo $row['gender']; ?></td>
<td><?php echo $row['jobtitle']; ?></td>
<td><?php echo $row['basic_salary']; ?></td>
<td><?php echo $row['loan']; ?></td>
<td><?php echo $row['p_fund']; ?></td>
<td><?php echo $row['bank_accno'];?></td>
<td><?php echo $row['Start_date']; ?></td>
<td><?php echo $row['dob']; ?></td>
<td><?php echo $row['Depart_id']; ?></td>
<td><?php echo $row['managesDepart_id'] ? $row['managesDepart_id'] : '--'; ?></td>
<td><a href="employee-update.php?edit=<?php echo $row['Employee_id']; ?>" class="btn btn-success btn-edit">Edit</a></td>
<td><a href="emp-up-deletephp.php?del=<?php echo $row['Employee_id']; ?>" class="btn btn-danger btn-delete">Delete</a></td>
</tr>
<tr class="collapse" id="collapse-<?php echo $row['Employee_id']; ?>">
<td colspan="16">
<div>
<!-- Content for the collapsible row -->
</div>
</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</body>
</html>
