<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Update</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="../css/crud.css">
</head>

<body style="background-color: #1c1c1c;">

  <div class="container my-5">
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
            <h4 class="text-white text-uppercase">
              Post Announcement/Event/News
              <a href="../dashboard/admin.php" class="btn btn-danger float-end">Back</a>
            </h4>
          </div>
          <div class="card-body">
            <form action="add.php" method="POST" enctype="multipart/form-data">
              <!-- title -->
              <div class="mb-3">
                <label for="title">
                  Title
                </label>
                <input type="text" value="<?= htmlspecialchars($_GET["title"] ?? "") ?>" name="title" class="form-control">
              </div>

              <!-- description -->
              <div class="mb-3">
                <label for="price">Caption</label>
                <textarea name="description" class="form-control" rows="5"><?= htmlspecialchars($_GET["description"] ?? "") ?></textarea>
              </div>

              <!-- image -->
              <div class="mb-5">
                <label for="uimage">Image</label>
                <input type="file" name="uimage" accept=".jpeg, .jpg, .png" class="form-control ">
              </div>

              <!-- submit button -->
              <div class="text-center">
                <button type="submit" name="add" class="btn btn-primary">Post</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>