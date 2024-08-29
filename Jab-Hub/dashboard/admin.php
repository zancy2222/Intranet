<?php
session_start();
include("../database.php");
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
                        <img src="../image/logo.png" alt="logo" style="width: 70px; height: 60px;">
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#!">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#eventPost">Announcement</a></li>
                        <li class="nav-item"><a class="nav-link" href="#taskPost">Task</a></li>
                        <li class="nav-item"><a class="nav-link" href="./employee.php">Employee</a></li>
                        
                    </ul>
                    <div class="col-md-3 text-end">
                    <a href="../validation/logout.php"><button type="button" class="btn btn-secondary me-2">Logout</button></a>
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

     
<!-- Event section -->
<div class="height-100" id="eventPost">
    <div class="container mt-5">
      <?php if (isset($_GET['error'])) { ?>
        <div class="alert alert-danger alert-dismissible fade show w-100" role="alert">
          <?php echo $_GET['error']; ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php } ?>

      <?php if (isset($_GET['success'])) { ?>
        <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
          <?php echo $_GET['success']; ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php } ?>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="text-white">
                Announcement
                <a href="../announcement/add_update.php" class="btn btn-primary float-end">Announce something </a>
              </h4>
            </div>
            <div class="card-body">
              <table class="table table-bordered text-white" style="background-color: #212121; border-color: #0e0e0e">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Caption</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = "SELECT id, image, title, description, date FROM announcements";
                  $stmt = $conn->prepare($sql);
                  if ($stmt) {
                    $stmt->execute();
                    $stmt->bind_result(
                      $id,
                      $image,
                      $title,
                      $description,
                      $date
                    );
                    while ($stmt->fetch()) { ?>
                      <tr>
                        <td><?= $id; ?></td>
                        <td>
                          <img src="../upload/<?= $image; ?>" alt="<?= $title; ?>" style="max-width: 100px; height: 100px" />
                        </td>
                        <td style="max-width: 150px; overflow: hidden; text-overflow: ellipsis;">
                          <?= $title; ?>
                        </td>
                        <td style="max-height: 50px; overflow: hidden; text-overflow: ellipsis; max-width: 200px; ">
                          <?= (strlen($description) > 100) ? substr($description, 0, 100) . '...' : $description; ?>
                        </td>
                        <td><?= $date; ?></td>
                        <td>
                          <a href="../announcement/view_update.php?id=<?= $id; ?>" class="btn btn-info text-sm">View</a>
                          <a href="../announcement/edit_update.php?id=<?= $id; ?>" class="btn btn-success text-sm">Edit</a>
                          <form action="../announcement/delete_update.php" method="POST" class="d-inline">
                            <button type="submit" name="delete" value="<?= $id; ?>" class="btn btn-danger text-sm">
                              Delete
                            </button>
                          </form>
                        </td>
                      </tr>
                  <?php
                    }
                    $stmt->close();
                  } else {
                    echo "SQL Error: " . $conn->error;
                  } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


<!-- Task section -->
<section id="taskPost" class="max-w-3xl mx-auto bg-white rounded p-6 shadow-md">
    <h2 class="text-2xl font-bold">Task Management</h2>

    <!-- Task Input Form -->
    <form id="taskForm" class="mt-4">
        <div class="mb-4">
            <label for="taskName" class="block text-sm font-semibold text-gray-600">Task Name</label>
            <input type="text" class="w-full mt-1 p-2 border rounded" id="taskName" placeholder="Enter task name" required>
        </div>
        <div class="mb-4">
            <label for="assignee" class="block text-sm font-semibold text-gray-600">Assignee</label>
            <input type="text" class="w-full mt-1 p-2 border rounded" id="assignee" placeholder="Enter assignee" required>
        </div>
        <div class="mb-4">
            <label for="dueDate" class="block text-sm font-semibold text-gray-600">Due Date</label>
            <input type="date" class="w-full mt-1 p-2 border rounded" id="dueDate" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Task</button>
    </form>

    <hr class="my-6">

    <!-- Task List -->
    <h3 class="text-xl font-semibold">Task List</h3>
    <ul class="list-group" id="taskList">
        <!-- Tasks will be dynamically added here -->
    </ul>
</section>

        


<footer class="text-center text-lg-start" style="background-color: #3E505C; color: whitesmoke;">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
    © 2023 Copyright: Jab Hub 
    
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->




        <!-- Task Management Script -->
        <script>
          // Function to handle form submission
          document.getElementById('taskForm').addEventListener('submit', function(event) {
              event.preventDefault();
      
              // Get form values
              const taskName = document.getElementById('taskName').value;
              const assignee = document.getElementById('assignee').value;
              const dueDate = document.getElementById('dueDate').value;
      
              // Add the task to the task list
              addTaskToList(taskName, assignee, dueDate);
      
              // Clear form inputs
              document.getElementById('taskForm').reset();
          });
      
          // Function to add task to the list
          function addTaskToList(taskName, assignee, dueDate) {
              const taskList = document.getElementById('taskList');
      
              // Create a new list item
              const listItem = document.createElement('li');
              listItem.classList.add('list-group-item');
      
              // Construct task details HTML
              listItem.innerHTML = `
                  <strong>${taskName}</strong>
                  <p>Assignee: ${assignee}</p>
                  <p>Due Date: ${dueDate}</p>
              `;
      
              // Append the new task to the task list
              taskList.appendChild(listItem);
          }
      </script>

        <script src="js/scripts.js"></script>

        <!-- Bootstrap JS and Popper.js -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8h7JUq9Q6eA" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <!-- Core theme JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>