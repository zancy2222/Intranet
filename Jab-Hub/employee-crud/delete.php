<?php
session_start();
include("../database.php");

if (isset($_POST["add"])) {
  $name = $_POST["username"];
  $email = $_POST["email"];
  $department = $_POST["department"];
  $password = $_POST["password"];
  $pass = password_hash($password, PASSWORD_DEFAULT);

  $sql = "INSERT INTO users (username ,email, department, password) values ('$name','$email', '$department','$pass')";
  $query = mysqli_query($conn, $sql);

  if ($query) {
    $_SESSION['message'] = "Employee Created Succesfully.";
    header("Location: ../employee-crud/add.php");
  } else {
    $_SESSION['message'] = "Employee Not Created.";
    header("Location: ../employee-crud/add.php");
  }
}

if (isset($_POST["update_student"])) {
  $id = $_POST["id"];
  $name = $_POST["username"];
  $email = $_POST["email"];
  $department = $_POST["department"];
  $password = $_POST["password"];
  $pass = password_hash($password, PASSWORD_DEFAULT);

  $sql = "UPDATE users SET username='$name', email='$email', department='$department', password = '$pass' WHERE id='$id'";
  $query = mysqli_query($conn, $sql);

  if ($query) {
    $_SESSION['message'] = "User Updated Successfully.";
    header("Location: ../dashboard/employee.php");
  } else {
    $_SESSION['message'] = "User Not Updated.";
    header("Location: ../dashboard/employee.php");
  }
}

if (isset($_POST["delete"])) {
    $id = $_POST["delete"];
  
    $query = "DELETE FROM users WHERE id = '$id'";
    $query_run = mysqli_query($conn, $query);
  
    if ($query_run) {
      $_SESSION['message'] = "Employee Deleted Successfully";
      header("Location: ../dashboard/employee.php");
      exit();
    } else {
      $_SESSION['message'] = "Employee Not Deleted";
      header("Location: ../dashboard/employee.php");
      exit();
    }
  }
