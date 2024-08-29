<?php
include("../database.php");
$id = $_GET['id'];
$sql = "SELECT * FROM announcements WHERE id='$id'";
$query = mysqli_query($conn, $sql);
$update = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View</title>
  <!-- boostrap cdn -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <!-- style -->
  <link rel="stylesheet" href="../css/crud.css">
</head>

<body style="background-color: #1c1c1c;;">
  <div class="container my-5">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="text-white text-uppercase">
              View
              <a href="../dashboard/admin.php" class="btn btn-danger float-end">Back</a>
            </h4>
          </div>
          <div class="card-body">
            <div class="form">
              <form action="#">
                <!-- image -->
                <div class="mb-3">
                  <label for="image">
                    Image
                  </label>
                  <img src="../upload/<?= $update['image'] ?>" alt="" style="max-width: 50%;" class="mb-2 d-block mx-auto" />
                </div>


                <!-- title -->
                <div class="mb-3">
                  <label for="title">
                    Title
                  </label>
                  <input type="text" value="<?= $update['title'] ?>" name="title" class="form-control" disabled>
                </div>

                <!-- description -->
                <div class="mb-3">
                  <label for="description">Caption</label>
                  <textarea name="description" class="form-control" rows="5" disabled>
                <?= $update['description'] ?>
                </textarea>
                </div>

                <!-- date -->
                <div class="mb-3">
                  <label for="date">
                    Date
                  </label>
                  <input type="text" value="<?= $update['date'] ?>" name="date" class="form-control" disabled>
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