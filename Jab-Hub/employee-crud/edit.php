<?php
include("../database.php");
$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id='$id'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4>Edit Employee 
              <a href="../dashboard/employee.php" class="btn btn-danger float-end">Back</a>
            </h4>
          </div>
          <div class="card-body">
            <form method="POST" action="delete.php">  
              <div class="mb-3">
                <input class="d-none" value="<?php echo $row['id'] ?>" name="id">
              </div>
              <div class="mb-3">
                <label for="name">
                  Username
                </label>
                <input type="text" value="<?php echo $row['username'] ?>" name="username" class="form-control">
              </div>
              <div class="mb-3">
                <label for="email">
                  Email
                </label>
                <input type="text" value="<?php echo $row['email'] ?>" name="email" class="form-control">
              </div>
              <div class="mb-3">
                <label for="department">
                  Department Name
                </label>
                <input type="text" value="<?php echo $row['department'] ?>" name="department" class="form-control">
              </div>
              <div class="mb-3">
                <label for="password">
                  Password
                </label>
                <input type="password" value="<?php echo $row['password'] ?>" name="password" class="form-control">
              </div>
              <div class="mb-3">
                <button class="btn btn-success" type="submit" name="update_student">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</body>

</html>