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
  <title>Update Post</title>

  <!-- bootsrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <!-- style -->
  <link rel="stylesheet" href="../css/crud.css">
</head>

<body style="background-color: #1c1c1c;">

  <div class="container my-5">
    <?php if (isset($_GET['error'])) { ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $_GET['error']; ?>
      </div>
    <?php } ?>

    <?php if (isset($_GET['success'])) { ?>
      <div class="alert alert-success" role="alert">
        <?php echo $_GET['success']; ?>
      </div>
    <?php } ?>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="text-white text-uppercase">
              Update Post
              <a href="../dashboard/admin.php" class="btn btn-danger float-end">Back</a>
            </h4>
          </div>
          <div class="card-body">
            <form action="edit.php?id=<?= $update['id'] ?>" method="post" enctype="multipart/form-data">
              <div class="form">
                <!-- image-->
                <div class="mb-3">
                  <img src="../upload/<?= $update['image'] ?>" alt="" style="max-width: 50%;" class="mb-2 d-block mx-auto" />
                  <label class="form-label">Image</label>
                  <input type="file" class="form-control" name="image" accept=".jpeg, .jpg, .png">
                  <input type="text" hidden="hidden" name="old_image" value="<?= $update['image'] ?>">
                </div>

                <!-- title -->
                <div class="mb-3">
                  <label for="title">
                    Title
                  </label>
                  <input type="text" value="<?= $update['title'] ?>" name="title" class="form-control">
                </div>

                <!-- description -->
                <div class="mb-3">
                  <label for="description">Caption</label>
                  <textarea name="description" class="form-control" rows="5">
                <?= $update['description'] ?>
                </textarea>
                </div>


                <!-- date -->
                <div class="mb-5">
                  <label for="date">
                    Date
                  </label>
                  <input type="date" value="<?= $update['date'] ?>" name="date" class="form-control">
                </div>


                <!-- edit button -->
                <div class="text-center">
                  <button type="submit" name="addWatch" class="btn btn-primary">Update</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>