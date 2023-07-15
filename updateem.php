<!DOCTYPE html>
<html>
<head>
  <title>Update Employee</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
    }
    .container {
      max-width: 600px;
      margin: 50px auto;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    .form-control {
      margin-bottom: 20px;
    }
    .form-control label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }
    .form-control input,
    .form-control select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      transition: border-color 0.3s ease;
    }
    .form-control input:focus,
    .form-control select:focus {
      outline: none;
      border-color: #95c5ed;
    }
    .button-container {
      text-align: right;
    }
    .button-container button {
      padding: 10px 20px;
      background-color: #4caf50;
      border: none;
      color: #fff;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    .button-container button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="container">
    <form action="em-updatephp.php" method="post">
      <div class="form-control">
        <input type="hidden" name="empid" value="<?php echo $id; ?>">
      </div>
      <div class="form-control">
        <label>Name</label>
        <input type="text" name="name" value="<?php echo $name; ?>">
      </div>
      <div class="form-control">
        <label>Date of Birth</label>
        <input type="date" name="dob" value="<?php echo $dob; ?>">
      </div>
      <div class="form-control">
        <label>Gender</label><br>
        <input type="radio" name="gender" value="male" <?php echo ($gender == 'male') ? 'checked' : ''; ?>> Male
        <input type="radio" name="gender" value="female" <?php echo ($gender == 'female') ? 'checked' : ''; ?>> Female
      </div>
      <div class="form-control">
        <label>Joining date</label>
        <input type="date" name="sdate" value="<?php echo $sdate; ?>">
      </div>
      <div class="form-control">
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $email; ?>">
      </div>
      <div class="form-control">
        <label>Phone</label>
        <input type="text" name="phone" value="<?php echo $phone; ?>">
      </div>
      <div class="form-control">
        <label>Loan</label>
        <input type="number" name="loan" value="<?php echo $loan; ?>">
      </div>
      <div class="form-control">
        <label>Provident fund</label>
        <input type="number" name="pfund" value="<?php echo $pfund; ?>">
      </div>
      <div class="form-control">
        <label>Bank Account No</label>
        <input type="number" name="bacc" value="<?php echo $bacc; ?>">
      </div>
      <div class="form-control">
        <label>Jobtitle</label>
        <select name="jobtitle">
          <option value="executive" <?php echo ($jobtitle == 'executive') ? 'selected' : ''; ?>>Executive</option>
          <option value="manager" <?php echo ($jobtitle == 'manager') ? 'selected' : ''; ?>>Manager</option>
          <option value="director" <?php echo ($jobtitle == 'director') ? 'selected' : ''; ?>>Director</option>
          <option value="accountant" <?php echo ($jobtitle == 'accountant') ? 'selected' : ''; ?>>Accountant</option>
          <option value="chief" <?php echo ($jobtitle == 'chief') ? 'selected' : ''; ?>>Chief</option>
        </select>
      </div>
      <div class="form-control">
        <label>Address</label>
        <input type="text" name="address" value="<?php echo $address; ?>">
      </div>
      <div class="form-control">
        <label>Employee Department</label>
        <input type="number" name="depid" value="<?php echo $depid; ?>">
      </div>
      <div class="form-control">
        <label>Managing Department</label>
        <input type="number" name="manid" value="<?php echo $manid; ?>">
      </div>
      <div class="button-container">
        <button type="submit">Update</button>
      </div>
    </form>
  </div>

  <script>
    // Add any necessary JavaScript code for animations or interactivity
  </script>
</body>
</html>
