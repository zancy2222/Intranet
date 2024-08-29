<?php
include "../database.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $id = $_GET['id'];
  $title = $_POST["title"];
  $description = $_POST["description"];
  $date = $_POST["date"];
  $old_image = $_POST["old_image"];

  $data = "title=" . $title;

  if (empty($title)) {
    $em = "Title is required";
    header("Location: edit_update.php?id=$id&error=$em&$data");
    exit;
  } else if (empty($description)) {
    $em = "Description is required";
    header("Location: edit_update.php?id=$id&error=$em&$data");
    exit;
  } else {
    if (isset($_FILES['image']['name']) and !empty($_FILES['image']['name'])) {
      $img_name = $_FILES['image']['name'];
      $tmp_name = $_FILES['image']['tmp_name'];
      $error = $_FILES['image']['error'];

      if ($error === 0) {
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_to_lc = strtolower($img_ex);

        $allowed_exs = array('jpg', 'jpeg', 'png');
        if (in_array($img_ex_to_lc, $allowed_exs)) {
          $new_img_name = uniqid($pname, true) . '.' . $img_ex_to_lc;
          $img_upload_path = '../upload/' . $new_img_name;

          // Delete old product image
          $old_image_path = "../upload/$old_image";
          if (file_exists($old_image_path)) {
            unlink($old_image_path);
          }

          // Move uploaded image to the upload folder
          move_uploaded_file($tmp_name, $img_upload_path);

          // Update the Database
          $sql = "UPDATE announcements 
                  SET image=?, title=?, description=?, date=?
                  WHERE id=?";
          $stmt = $conn->prepare($sql);
          $stmt->execute([$new_img_name, $title, $description, $date,  $id]);

          header("Location: ../dashboard/admin.php?success=Announcements updated successfully");
          exit;
        } else {
          $em = "You can't upload files of this type";
          header("Location: edit_update.php?id=$id&error=$em&$data");
          exit;
        }
      } else {
        $em = "Unknown error occurred!";
        header("Location: edit_update.php?id=$id&error=$em&$data");
        exit;
      }
    } else {
      $sql = "UPDATE announcements 
              SET title=?, description=?, date=?
              WHERE id=?";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$title, $description, $date, $id]);

      header("Location: ../dashboard/admin.php?success=Announcements updated successfully");
      exit;
    }
  }
}
