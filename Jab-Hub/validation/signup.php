<?php
include "../database.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $email = $_POST["email"];
  $username = $_POST["username"];
  $department = $_POST["department"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirm_password"];

  $data = "email=" . $email . "&username=" . $username;

  // Check for duplicate email
  $checkEmailSql = "SELECT * FROM users WHERE email = ?";
  $checkEmailStmt = $conn->prepare($checkEmailSql);
  $checkEmailStmt->bind_param("s", $email);
  $checkEmailStmt->execute();
  $checkEmailResult = $checkEmailStmt->get_result();

  if ($checkEmailResult->num_rows > 0) {
    $em = "Email address already taken";
    header("Location: ../form/register.php?error=$em&$data");
    exit;
  }

  // Check for duplicate username
  $checkUsernameSql = "SELECT * FROM users WHERE username = ?";
  $checkUsernameStmt = $conn->prepare($checkUsernameSql);
  $checkUsernameStmt->bind_param("s", $username);
  $checkUsernameStmt->execute();
  $checkUsernameResult = $checkUsernameStmt->get_result();

  if ($checkUsernameResult->num_rows > 0) {
    $em = "Username already exists";
    header("Location: ../form/register.php?error=$em&$data");
    exit;
  }

  if (empty($email)) {
    $em = "Email is required";
    header("Location: ../form/register.php?error=$em&$data");
    exit;
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $em = "Invalid Email Format";
    header("Location: ../form/register.php?error=$em&$data");
    exit;
  } else if (empty($username)) {
    $em = "Username is required";
    header("Location: ../form/register.php?error=$em&$data");
    exit;
  } else if (empty($department)) {
    $em = "Department name is required";
    header("Location: ../form/register.php?error=$em&$data");
    exit;
  } else if (empty($password)) {
    $em = "Password is required";
    header("Location: ../form/register.php?error=$em&$data");
    exit;
  } else if (strlen($password) < 8) {
    $em = "Password must be at least 8 characters long";
    header("Location: ../form/register.php?error=$em&$data");
    exit;
  } else if (!preg_match("/[a-zA-Z]/", $password)) {
    $em = "Password must contain at least one letter";
    header("Location: ../form/register.php?error=$em&$data");
    exit;
  } else if (!preg_match("/[0-9]/", $password)) {
    $em = "Password must contain at least one number";
    header("Location: ../form/register.php?error=$em&$data");
    exit;
  } else if (empty($confirmpassword)) {
    $em = "Confirm Password is required";
    header("Location: ../form/register.php?error=$em&$data");
    exit;
  } else if ($password !== $confirmpassword) {
    $em = "Password not matched";
    header("Location: ../form/register.php?error=$em&$data");
    exit;
  } else {
    // Hash the password
    $pass = password_hash($password, PASSWORD_DEFAULT);

    // Insert into Database
    $sql = "INSERT INTO users(username, email, department, password) VALUES(?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username, $email, $department, $pass]);

    header("Location: ../form/register.php?success=Your account has been created successfully");
    exit;
  }
}
