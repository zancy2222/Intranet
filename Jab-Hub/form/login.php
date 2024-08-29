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
                    <li class="nav-item"><a class="nav-link" href="../index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="../index.php#goals">Our Goal</a></li>
                        <li class="nav-item"><a class="nav-link" href="../index.php#about">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="../index.php#contact">Contact</a></li>
                    </ul>
                    <div class="col-md-3 text-end">
                    <a href="../index.php"><button type="button" class="btn btn-primary me-2">Go back</button></a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- login -->
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6 col-xl-5">

        <div class="text-center mb-3">
          <h2 class="text-white fw-bold">Login</h2>
          <small style="color: #9baaaa">Welcome back!</small>
        </div>

        <!-- error message -->
        <?php if (isset($_GET['error'])) { ?>
          <div class="alert alert-danger alert-dismissible fade show py-1 px-3" role="alert">
            <div class="d-flex align-items-center justify-content-between">
              <p class="mb-0"><?php echo $_GET['error']; ?></p>
              <a href="#" data-bs-dismiss="alert" aria-label="Close" id="close-alert"><i class='bx bx-x fs-3 text-black'></i></a>
            </div>

          </div>
        <?php } ?>

        <!-- success messge -->
        <?php if (isset($_GET['success'])) { ?>
          <div class="alert alert-danger alert-dismissible fade show py-1 px-3" role="alert">
            <div class="d-flex align-items-center justify-content-between">
              <p class="mb-0"><?php echo $_GET['success']; ?></p>
              <a href="#" data-bs-dismiss="alert" aria-label="Close" id="close-alert"><i class='bx bx-x fs-3 text-black'></i></a>
            </div>
          </div>
        <?php } ?>

        <form action="../validation/signin.php" method="post" novalidate class="data-form">

          <!-- username -->
          <div class="mb-3">
            <div class="data-input">
              <i class="bx bxs-user fs-5" style="color: #9baaaa"></i>
              <input type="text" class="form-control" placeholder="Username" name="username" autocomplete="off" value="<?php echo (isset($_GET['username'])) ? $_GET['username'] : "" ?>" />
            </div>
          </div>

          <!-- password -->
          <div class="mb-1">
            <div class="data-input">
              <i class="bx bxs-lock-alt fs-5" style="color: #9baaaa"></i>
              <input type="password" class="form-control" placeholder="Password" name="password" />
            </div>
          </div>

          <!-- forgot passwrod -->
          <div class="">
            <small>
              <a href="forgot.php" class="text-decoration-none forgot-btn">Forgot password</a>
            </small>
          </div>

          <!-- button -->
          <div class="mb-3 mt-4 text-center">
            <input type="submit" value="Submit" class="submit-btn rounded-3 py-1 text-white" />
          </div>
        </form>

        <!-- back -->
        <div class="text-center">
          <small style="color: #9baaaa">
            Don't have an account?
            <a href="register.php" class="text-decoration-none" style="color: #f7770f">Register</a>
          </small>
        </div>

      </div>
    </div>
  </div>                
                 
    </body> 
</html>     