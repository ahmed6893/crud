<?php
include 'db.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $id = $_POST['id'];
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $position = $_POST['position'];
  $start_date = $_POST['start_date'];
  $salary = $_POST['salary'];
  $email = $_POST['email'];

  $sql = "UPDATE employees SET
          first_name = '$first_name',
          last_name = '$last_name',
          position = '$position',
          start_date = '$start_date',
          salary = '$salary',
          email = '$email'
          WHERE id = $id";

  if (mysqli_query($conn, $sql)) {
    header("Location: index.php");
    exit;
  } else {
    echo "Update failed: " . mysqli_error($conn);
  }
}

$_SESSION['success'] = "Employee updated successfully!";
header("Location: index.php");
exit();
?>