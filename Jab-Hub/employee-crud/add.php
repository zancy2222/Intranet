<?php
session_start();
include "../database.php";
$is_valid = true;
$nameErr = $emailErr = $deptErr = $passwordErr = $confirmErr = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $department = $_POST["department"];
  $password = $_POST["password"];
  $confirmPassword = $_POST["confirm"];

  // Name Validation
  if (empty($name)) {
    $nameErr = "Name is required";
    $is_valid = false;
  } else if (preg_match("/[^a-zA-Z0-9 ]/", $name)) {
    $nameErr = "Please enter letters or numbers only";
    $is_valid = false;
  } 

  // Email Validation
  if (empty($email)) {
    $emailErr = "Email is required";
    $is_valid = false;
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $nameErr = "Please enter valid email address";
    $is_valid = false;
  }

  // Dept Validation
  if (empty($department)) {
    $deptErr = "Department Name is required";
    $is_valid = false;
  } 

  // Password Validation
  if (empty($password)) {
    $passwordErr = "Password is required";
    $is_valid = false;
  } else if (strlen($password) < 8) {
    $passwordErr = "Password must be at least 8 characters long";
    $is_valid = false;
  } else if (!preg_match("/[a-zA-Z]/", $password)) {
    $passwordErr = "Password must contain at least one letter";
    $is_valid = false;
  } else if (!preg_match("/[0-9]/", $password)) {
    $passwordErr = "Password must contain at least one digit";
    $is_valid = false;
  } else if (!preg_match("/[A-Z]/", $password)) {
    $passwordErr = "Password must start with an uppercase letter";
    $is_valid = false;
  } else if (!preg_match("/[!@#$%^&*()_+{}\[\]:;<>,.?~\\-]/", $password)) {
    $passwordErr = "Password must contain at least one special character";
    $is_valid = false;
  }

  // Confirm Password
  if (empty($confirmPassword)) {
    $confirmErr = "Confirm Password is required";
    $is_valid = false;
  } else if ($password !== $confirmPassword) {
    $confirmErr = "Passwords do not match";
    $is_valid = false;
  }

  if ($is_valid) {
    // Convert password into Hash
    $pass = password_hash($password, PASSWORD_DEFAULT);

    
    

    // Check if the email is already taken
    $checkEmailSql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($checkEmailSql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      // Email is already taken
      $emailErr = "Email Already Taken";
      $is_valid = false;
    } else {
      // Email is not taken, proceed with the registration
      $insertSql = "INSERT INTO users (username, email, department, password) VALUES (?, ?, ?, ?)";
      $stmt = $conn->prepare($insertSql);
      $stmt->bind_param("ssss", $name, $email, $department, $pass);

      if ($stmt->execute()) {
        $_SESSION["message"] = "Employee Created Successfully";
        header("Location: ../employee-crud/add.php");
        exit;
      } else {
        // Handle the case where the insert query fails
        $_SESSION["message"] = "Employee Created Failed";
        header("Location: ../employee-crud/add.php");
        exit;
      }
    }
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Employee</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #36454F;">
            <div class="container">
                <div class="col md-3 mb-2 mb-md-0">
                    <a href="/" class="d-inline-flex text-decoration-none">
                        <img src="../image/logo.png" alt="logo" style="width: 70px; height: 60px;">
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="../dashboard/admin.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="../dashboard/admin.php#eventPost">Announcement</a></li>
                        <li class="nav-item"><a class="nav-link" href="../dashboard/admin.php#taskPost">Task</a></li>
                        <li class="nav-item"><a class="nav-link" href="../dashboard/employee.php">Employee</a></li>
                    </ul>
                    <div class="col-md-3 text-end">
                    <a href="../validation/logout.php"><button type="button" class="btn btn-secondary me-2">Logout</button></a>
                    </div>
                </div>
            </div>
        </nav>

  <div class="container mt-5">
    <?php
    if (isset($_SESSION['message'])) {
    ?>
      <div class="alert alert-dismissible alert-warning fade show" role="alert">
        <span><?= $_SESSION['message'] ?></span>
        <button class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php
      unset($_SESSION['message']);
    }
    ?>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4>
              Add Employee 
              <a href="../dashboard/employee.php" class="btn btn-danger float-end">Back</a>
            </h4>
          </div>
          <div class="card-body">
            <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
              <div class="mb-3">
                <label for="username">
                  Username
                </label>
                <input type="text" value="<?= htmlspecialchars($name ?? ""); ?>" name="name" class="form-control">
                <p class="text-danger"><?= $nameErr; ?></p>
              </div>
              <div class="mb-3">
                <label for="studentEmail">Email</label>
                <input type="text" value="<?= htmlspecialchars($email ?? ""); ?>" name="email" class="form-control">
                <p class="text-danger"><?= $emailErr; ?></p>
              </div>
              <div class="mb-3">
                <label for="department">
                  Department Name
                </label>
                <input type="text" value="<?= htmlspecialchars($department ?? ""); ?>" name="department" class="form-control">
                <p class="text-danger"><?= $nameErr; ?></p>
              </div>
              <div class="mb-3">
                <label for="email">
                  Password
                </label>
                <input type="password" name="password" class="form-control" value="<?= htmlspecialchars($password ?? ""); ?>">
                <p class="text-danger"><?= $passwordErr; ?></p>

              </div>
              <div class="mb-3">
                <label for="email">
                  Confirm Password
                </label>
                <input type="password" name="confirm" class="form-control" value="<?= htmlspecialchars($confirmPassword ?? ""); ?>">
                <p class="text-danger"><?= $confirmErr; ?></p>

              </div>
              <div class="mb-3">
                <button type="submit" name="add" class="btn btn-primary">Add</button>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>


</body>

</html>