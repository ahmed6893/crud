<?php
session_start();
include 'db.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $sql = "DELETE FROM employees WHERE id = $id";

  if (mysqli_query($conn, $sql)) {
    header("Location: index.php");
    exit;
  } else {
    echo "Delete failed: " . mysqli_error($conn);
  }

} else {
  echo "Invalid request!";
}

$_SESSION['success'] = "Employee deleted successfully!";
header("Location: index.php");
exit();
?>