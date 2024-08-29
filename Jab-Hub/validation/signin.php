<?php
session_start();
include "../database.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $data = "username=" . $username;

  if (empty($username) || empty($password)) {
    $em = "Username and password are required";
    header("Location: ../form/login.php?error=$em&$data");
    exit;
  }

  // Check if it's an admin login
  $isAdmin = false;

  $adminSql = "SELECT * FROM admins WHERE username = ?";
  $stmtAdmin = $conn->prepare($adminSql);
  $stmtAdmin->bind_param("s", $username);
  $stmtAdmin->execute();
  $resultAdmin = $stmtAdmin->get_result();

  if ($resultAdmin->num_rows == 1) {
    $isAdmin = true;
  }

  // Common login logic for both admin and user
  $table = $isAdmin ? 'admins' : 'users';
  $sql = "SELECT * FROM $table WHERE username = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
    $storedPassword = $user['password'];

    if (($isAdmin && $password === $storedPassword) || password_verify($password, $storedPassword)) {
      $_SESSION['id'] = $user['id'];
      $_SESSION['username'] = $username;

      // Redirect to admin.php for admin, user-index.php for users
      $redirectPage = $isAdmin ? "dashboard/admin.php" : "user-index.php";
      header("Location: ../$redirectPage");
      exit;
    } else {
      $em = "Incorrect username or password";
    }
  } else {
    $em = "Incorrect username or password";
  }

  // Redirect back to login-page with error message
  header("Location: ../form/login.php?error=$em&$data");
  exit;
}
