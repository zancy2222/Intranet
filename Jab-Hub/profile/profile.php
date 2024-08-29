<?php
session_start();
include '../validation/user.php';
include "../database.php";

if (!isset($_SESSION['id'])) {
  header("Location: user-index.php");
  exit();
}

$user = getUserById($_SESSION['id'], $conn);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Jab Hub</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
        
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
                    <li class="nav-item"><a class="nav-link" href="../user-index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="../user-index.php#eventPost">Announcement</a></li>
                        <li class="nav-item"><a class="nav-link" href="#taskPost">Task</a></li>
                        <li class="nav-item"><a class="nav-link" href="../view-employee.php">Employee</a></li>
                    </ul>
                    <div class="col-md-3 text-end">
                        <?php
                        if (isset($_SESSION["id"])) { ?>
                         <a href="../user-index.php"><button type="button" class="btn btn-primary me-2">Go back</button></a>
                         <?php } else { ?>
                        <a href="form/login.php"><button type="button" class="btn btn-primary me-2">Login/Register</button></a>
                        <?php  } ?>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Profile -->
         <!-- title -->
         <div class="mb-3" id="form-title">
              <h3>My Profile</h3>
              <small>Manage and protect your account</small>
            </div>

            <form method="post" action="../validation/edit.php" enctype="multipart/form-data">
              <!-- error message -->
              <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-danger alert-dismissible fade show py-1 px-3" role="alert">
                  <div class="d-flex align-items-center justify-content-between">
                    <p class="mb-0"><?php echo $_GET['error']; ?></p>
                    <a href="#" data-bs-dismiss="alert" aria-label="Close" id="close-alert"><i class='bx bx-x fs-3 text-black'></i></a>
                  </div>

                </div>
              <?php } ?>

              <!-- success message -->
              <?php if (isset($_GET['success'])) { ?>
                <div class="alert alert-success alert-dismissible fade show py-1 px-3" role="alert">
                  <div class="d-flex align-items-center justify-content-between">
                    <p class="mb-0"><?php echo $_GET['success']; ?></p>
                    <a href="#" data-bs-dismiss="alert" aria-label="Close" id="close-alert"><i class='bx bx-x fs-3 text-black'></i></a>
                  </div>
                </div>
              <?php } ?>

              <!-- username -->
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" placeholder="Enter your username" value="<?= htmlspecialchars($user["username" ?? ""]); ?>" name="username">
              </div>

              <!-- email -->
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" placeholder="Enter your email" value="<?= htmlspecialchars($user["email" ?? ""]); ?>" name="email">
              </div>

              <!-- deptname -->
              <div class="mb-3">
                <label for="department" class="form-label">Department Name</label>
                <input type="text" class="form-control" placeholder="Enter your Department" value="<?= htmlspecialchars($user["department" ?? ""]); ?>" name="department">
              </div>

              <!-- save button -->
              <button type="submit" class="btn btn-primary me-2">Save</button>
            </form>
          </div>                   

        <!-- Logout -->
        
        <a href="../validation/logout.php"><button type="button" class="btn btn-secondary me-2">Logout</button></a>

                      
    </body> 
</html>       
