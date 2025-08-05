<?php
include 'db.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $position = $_POST['position'];
  $start_date = $_POST['start_date'];
  $salary = $_POST['salary'];
  $email = $_POST['email'];

  $sql = "INSERT INTO employees (first_name, last_name, position, start_date, salary, email)
          VALUES ('$first_name', '$last_name', '$position', '$start_date', '$salary', '$email')";

  if (mysqli_query($conn, $sql)) {
    header("Location: index.php");
    exit();
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}

$_SESSION['success'] = "Employee created successfully!";
header("Location: index.php");
exit();
?>