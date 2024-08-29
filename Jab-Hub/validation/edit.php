<?php
include "../database.php";
session_start();

if (isset($_SESSION['id'])) {
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $username = $_POST["username"];
    $department = $_POST["department"];
    $password = $_POST["password"];
    $id = $_SESSION['id'];

    // Check for duplicate email excluding the current user
    $checkEmailSql = "SELECT * FROM users WHERE email = ? AND id != ?";
    $checkEmailStmt = $conn->prepare($checkEmailSql);
    $checkEmailStmt->bind_param("si", $email, $id);
    $checkEmailStmt->execute();
    $checkEmailResult = $checkEmailStmt->get_result();

    if ($checkEmailResult->num_rows > 0) {
      $em = "Email address already exists";
      header("Location: ../profile/profile.php?error=$em");
      exit;
    }

    // Check for duplicate username excluding the current user
    $checkUsernameSql = "SELECT * FROM users WHERE username = ? AND id != ?";
    $checkUsernameStmt = $conn->prepare($checkUsernameSql);
    $checkUsernameStmt->bind_param("si", $username, $id);
    $checkUsernameStmt->execute();
    $checkUsernameResult = $checkUsernameStmt->get_result();

    if ($checkUsernameResult->num_rows > 0) {
      $em = "Username already exists";
      header("Location: ../profile/profile.php?error=$em");
      exit;
    }

    if (empty($email)) {
      $em = "Email address is required";
      header("Location: ../profile/profile.php?error=$em");
      exit;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $em = "Invalid Email Format";
      header("Location: ../profile/profile.php?error=$em");
      exit;
    } elseif (empty($username)) {
      $em = "Username is required";
      header("Location: ../profile/profile.php?error=$em");
      exit;
    } else {
      // Update the Database without changing the password if it's empty
      if (empty($password)) {
        $sql = "UPDATE users 
                SET email=?, username=?, department=?
                WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $email, $username, $department, $id);
        $stmt->execute();
      } else {
        // Password validation
        if (strlen($password) < 8 || !preg_match("/[a-zA-Z]/", $password) || !preg_match("/[0-9]/", $password)) {
          $em = "Password should be at least 8 characters with at least one letter and one number";
          header("Location: ../profile/profile.php?error=$em");
          exit;
        }

        // Update the Database with password change
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE users 
                SET email=?, username=?, department=?, password=?
                WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $email, $username, $department, $hashedPassword, $id);
        $stmt->execute();
      }

      $_SESSION['username'] = $username;
      header("Location: ../profile/profile.php?success=Your account has been updated successfully");
      exit;
    }
  }
}
