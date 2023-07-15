<!DOCTYPE html>
<html>
<head>
  <title>Update Employee</title>
  <style>
    /* Add your custom styles here */
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
    }
    
    .container {
      max-width: 500px;
      margin: 0 auto;
      padding: 50px;
      background-color: #fff;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    
    h1 {
      text-align: center;
      margin-bottom: 30px;
      color: #333;
    }
    
    .form-group {
      margin-bottom: 20px;
    }
    
    .form-group label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
      color: #333;
    }
    
    .form-group input,
    .form-group select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      color: #555;
    }
    
    .submit-button {
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    
    .submit-button:hover {
      background-color: #45a049;
    }
  </style>
  
  <script>
    // Add interactivity here
    window.addEventListener('load', function() {
      var form = document.getElementById('updateForm');
      form.addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent form submission
        
        // Perform form validation or additional logic here
        
        // Submit form using AJAX or redirect to a confirmation page
        form.submit();
      });
    });
  </script>
</head>
<body>
  <div class="container">
    <h1>Update Employee</h1>
    
    <form id="updateForm" action="em-updatephp.php" method="post">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" value="<?php echo $name;?>">
      </div>
      
      <div class="form-group">
        <label for="dob">Date of Birth</label>
        <input type="date" name="dob" value="<?php echo $dob;?>">
      </div>
      
      <div class="form-group">
        <label for="gender">Gender</label><br>
        <input type="radio" name="gender" value="male" <?php if ($gender == 'male') echo 'checked'; ?>> Male
        <input type="radio" name="gender" value="female" <?php if ($gender == 'female') echo 'checked'; ?>> Female
      </div>
      
      <div class="form-group">
        <label for="sdate">Joining Date</label>
        <input type="date" name="sdate" value="<?php echo $sdate;?>">
      </div>
      
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" value="<?php echo $email;?>">
      </div>
      
      <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" name="phone" value="<?php echo $phone;?>">
      </div>
      
      <div class="form-group">
        <label for="loan">Loan</label>
        <input type="number" name="loan" value="<?php echo $loan;?>">
      </div>
      
      <div class="form-group">
        <label for="pfund">Provident Fund</label>
        <input type="number" name="pfund" value="<?php echo $pfund;?>">
      </div>
      
      <div class="form-group">
        <label for="bacc">Bank Account No</label>
        <input type="number" name="bacc" value="<?php echo $bacc;?>">
      </div>
      
      <div class="form-group">
        <label for="jobtitle">Job Title</label>
        <select name="jobtitle">
          <option value="executive" <?php if ($jobtitle == 'executive') echo 'selected'; ?>>Executive</option>
          <option value="manager" <?php if ($jobtitle == 'manager') echo 'selected'; ?>>Manager</option>
          <option value="director" <?php if ($jobtitle == 'director') echo 'selected'; ?>>Director</option>
          <option value="accountant" <?php if ($jobtitle == 'accountant') echo 'selected'; ?>>Accountant</option>
          <option value="chief" <?php if ($jobtitle == 'chief') echo 'selected'; ?>>Chief</option>
        </select>
      </div>
      
      <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="address" value="<?php echo $address;?>">
      </div>
      
      <div class="form-group">
        <label for="depid">Employee Department</label>
        <input type="number" name="depid" value="<?php echo $depid;?>">
      </div>
      
      <div class="form-group">
        <label for="manid">Managing Department</label>
        <input type="number" name="manid" value="<?php echo $manid;?>">
      </div>
      
      <input type="submit" value="Update" class="submit-button">
    </form>
  </div>
</body>
</html>
