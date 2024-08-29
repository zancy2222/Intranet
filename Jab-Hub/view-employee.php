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
                        <li class="nav-item"><a class="nav-link" href="user-index.php#eventPost">Announcement</a></li>
                        <li class="nav-item"><a class="nav-link" href="user-index.php#taskPost">Task</a></li>
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
    <?php
    
// Initialize variables
$sql = "SELECT id, username, email, department FROM users";
$search_query = '';

// Check if search query is set
if (isset($_GET['query'])) {
    $search_query = $_GET['query'];
    $sql .= " WHERE username LIKE '%$search_query%' OR email LIKE '%$search_query%' OR department LIKE '%$search_query%'";
}

// Fetch data from the database
$result = $conn->query($sql);

?>

<div class="row">
    <div class="col-md-12">
        <div class="card">

            <!-- Search Bar -->
            <div class="container my-4">
                <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search employees" aria-label="Search"
                        name="query" value="<?php echo $search_query; ?>">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>

            <div class="card-header">
                <h4>Employee Details
                    <a href="user-index.php" class="btn btn-danger float-end mx-3">Back to Home</a>
                </h4>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['department']; ?></td>
                            <td>
                                <a href="employee-crud/view2.php?id=<?php echo $row['id']; ?>"
                                    class="btn btn-info text-sm">View</a>
                            </td>
                        </tr>
                        <?php
                            }
                        } else {
                            echo "<tr><td colspan='5'>No records found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




  <!-- Bootstrap JS Bundle CDN -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

  <!-- jQuery CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>   