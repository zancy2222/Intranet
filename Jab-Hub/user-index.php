<?php
session_start();
include("database.php");
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
        
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #36454F;">
            <div class="container">
                <div class="col md-3 mb-2 mb-md-0">
                    <a href="/" class="d-inline-flex text-decoration-none">
                        <img src="image/logo.png" alt="logo" style="width: 70px; height: 60px;">
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="user-index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#eventPost">Announcement</a></li>
                        <li class="nav-item"><a class="nav-link" href="#taskPost">Task</a></li>
                        <li class="nav-item"><a class="nav-link" href="view-employee.php">Employee</a></li>
                        
                    </ul>
                    <div class="col-md-3 text-end">
                        <?php
                        if (isset($_SESSION["id"])) { ?>
                        <a href="profile/profile.php" id="username"><button type="button" class="btn btn-primary me-2"> 
                        <?= $_SESSION["username"] ?>
                        </button></a>
                         <?php } else { ?>
                        <a href="form/login.php"><button type="button" class="btn btn-primary me-2">Login/Register</button></a>
                        <?php  } ?>
                    </div>
                </div>
            </div>
        </nav>
        
        <!-- Carousel -->
<div id="carouselExample" class="carousel slide bg-dark" data-bs-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-bs-target="#home" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#home" data-bs-slide-to="1"></li>
        <li data-bs-target="#home" data-bs-slide-to="2"></li>
      </ol>
    <div class="carousel-inner">
        <div class="carousel-item active h-96 relative">
            <img
                src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                class="d-block w-100 h-full object-cover"
                alt="Image 1"
            />
            <div class="carousel-caption top-20">
                <h1 class="text-white fs-1 fw-bolder">Unlock efficiency with a centralized hub</h1>
                <p class="text-white-70 fs-3 mb-0">where every resource converges for seamless access and amplified productivity.</p>
            </div>
        </div>

        <div class="carousel-item h-96 relative">
            <img
                src="https://images.unsplash.com/photo-1627634777217-c864268db30c?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                class="d-block w-100 h-full object-cover"
                alt="Image 2"
            />
            <div class="carousel-caption top-20">
                <h1 class="text-white fs-1 fw-bolder">Foster a sense of unity</h1>
                <p class="text-white-70 fs-3 mb-0">where each connection strengthens the community, turning colleagues into collaborators and workplaces into families.</p>
            </div>
        </div>

        <div class="carousel-item h-96 relative">
            <img
                src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                class="d-block w-100 h-full object-cover"
                alt="Image 3"
            />
            <div class="carousel-caption top-20">
                <h1 class="text-white fs-1 fw-bolder">Empower success</h1>
                <p class="text-white-70 fs-3 mb-0">Keep every team member informed and aligned with the organization's goals, creating a unified journey towards achievement.</p>
            </div>
        </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Prev</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

    

<!-- Event Card Section -->
<div class="container-fluid h-auto p-5" id="content-container">
    <!-- title -->
    <div class="d-flex justify-content-between mb-3">
      <h2 class="fw-bold text-uppercase text-white">Announcements</h2>
    </div>
    <!-- row -->
    <div class="row js-slick-carousel" data-aos="fade-up">
      <?php
      $sql_news = "SELECT id, image, title, description, date FROM announcements";
      $result_news = $conn->query($sql_news);
      if ($result_news->num_rows > 0) {
        while ($row_news =
          $result_news->fetch_assoc()
        ) { ?>
          <!-- Cards -->
          <div class="col position-relative">
            <div class="card">
              <img class="card-img-top" src="upload/<?= $row_news['image']; ?>" alt="" />
              <div class="card-body">
                <p class="card-text"><?= $row_news['title']; ?></p>
                <div class="d-flex justify-content-between">
                  <p style="color: #9baaaa">
                    <i class="bx bx-calendar me-1"></i><?= $row_news['date']; ?>
                  </p>
                  <a href="#" id="read-more" data-bs-toggle="modal" data-bs-target="#newsModal<?= $row_news["id"]; ?>">
                    Show Full</a>
                </div>
              </div>
            </div>
          </div>
      <?php
        }
      } else {
        echo '<h5 style="color: white; text-align: center;">No news found</h5>';
      }
      ?>
    </div>
  </div>

  <!-- news modal -->
  <?php
  $result_news = $conn->query($sql_news);
  if ($result_news->num_rows > 0) {
    while ($row_news = $result_news->fetch_assoc()) { ?>
      <div class="modal fade content-modal" id="newsModal<?= $row_news["id"]; ?>" tabindex="-1" aria-labelledby="newsModal<?= $row_news["id"]; ?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <!-- close -->
            <div class="d-flex justify-content-between py-2 px-3">
              <a href="#" data-bs-dismiss="modal" aria-label="Close"><i class='bx bx-x fs-2' id="close"></i></a>
            </div>
            <div class="modal-body">
              <p class="text-center text-white fs-4"><?= $row_news['title']; ?></p>
              <small class="text-center d-block mb-2"><?= $row_news['date']; ?></small>
              <img class="img-fluid mb-3" src="upload/<?= $row_news['image']; ?>" alt="" />
              <p><?= nl2br($row_news['description']); ?></p>
            </div>
          </div>
        </div>
      </div>
  <?php
    }
  }
  ?>


<!-- Goals section-->
<section class="py-5">
  <div class="container my-5">
      <div class="row justify-content-center">
          <div class="col-lg-6">
              <h2>Our Goals</h2>
              <p class="lead">Our goal is to create a dynamic workplace through effective communication and collaboration. Our centralized hub serves as the epicenter for streamlined communication, providing access to company updates, resources, and collaboration tools. This fosters a culture of transparency, unity, and informed decision-making.</p>
              <p class="mb-0">Join us as we leverage technology to empower every employee, encouraging a vibrant community and shared success.</p>
          </div>
      </div>
  </div>
</section>

        


        <!-- Image element -->
        <div class="py-5 mt-5 bg-image-full" style="background-image: url('https://images.unsplash.com/photo-1553877522-43269d4ea984?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')">
            <div style="height: 20rem"></div>
        </div>
        <!-- About section-->
        <section class="py-5" style="background-color: #DBE2E9;" >
            <div class="container my-5">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <img src="image/logo.png" alt="logo" style="height: 15rem;">
                    </div>
                    <div class="col-lg-6">
                        <h2>About the Company</h2>
                        <p class="lead">We're more than just a workplace; we're a community of innovators dedicated to shaping the future. Committed to excellence, we leverage cutting-edge technology and foster a collaborative environment. Our passion drives us to create, innovate, and succeed together. Join us on a journey where every individual contributes to our collective success, making your company a place where great ideas come to life</p>
                        <p class="mb-0">Join us on a journey where every individual contributes to our collective success, making your company a place where great ideas come to life</p>
                    </div>
                </div>
            </div>
        </section>



<!-- Footer -->
<footer class="text-center text-lg-start" style="background-color: #3E505C; color: whitesmoke;">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center p-4 border-bottom">
      <!-- Left -->
      <div class="me-5 d-none d-lg-block">
        <span>Get connected with us on social networks:</span>
      </div>
      <!-- Left -->
  
      <!-- Right -->
      <div>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-google"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-instagram"></i>
        </a>
        
      </div>
      <!-- Right -->
    </section>
    <!-- Section: Social media -->
  
    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
  
          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">Keanel Allian S. Soriano</h6>
            <p><i class="fas fa-home me-3"></i> Caloocan City, Metro Manila, PH</p>
            <p>
              <i class="fas fa-envelope me-3"></i>
              keanelsoriano@gmail.com
            </p>
            <p><i class="fas fa-phone me-3"></i> +63 948 609 2896</p>
          </div>
          <!-- Grid column -->
  
          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">Abubakar M. Lawama</h6>
            <p><i class="fas fa-home me-3"></i> Caloocan City, Metro Manila, PH</p>
            <p>
              <i class="fas fa-envelope me-3"></i>
              lawama03@gmail.com
            </p>
            <p><i class="fas fa-phone me-3"></i> +63 930 879 7649</p>
            
          </div>
          <!-- Grid column -->
  
          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">Ronald Stephen T. Tardaguila</h6>
            <p><i class="fas fa-home me-3"></i> Caloocan City, Metro Manila, PH</p>
            <p>
              <i class="fas fa-envelope me-3"></i>
              ronaldtardaguila@gmail.com
            </p>
            <p><i class="fas fa-phone me-3"></i> +63 234 567 8910</p>
            
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->

    <footer>
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
    © 2023 Copyright: Jab Hub 
    
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->


        <script src="js/scripts.js"></script>

        <!-- Bootstrap JS and Popper.js -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8h7JUq9Q6eA" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <!-- Core theme JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>