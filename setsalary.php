<?php
include('configall.php');

$salary = $_POST["salary"];
$jobtitle = $_POST["jobtitle"];

$sql = "UPDATE `job` SET `basic_salary` = '$salary' WHERE `Job_Title` = '$jobtitle';";
$result = mysqli_query($connection, $sql);

if ($result) {
    header('Location: employee.php');
} else {
    echo 'Failed to update salary';
}
?>
