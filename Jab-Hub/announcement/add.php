<?php
include "../database.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $title = $_POST["title"];
  $desc = $_POST["description"];
  $data = "title=" . $title . "&description=" . $desc;

  if (empty($title)) {
    $em = "Title is required";
    header("Location: add_update.php?error=$em&$data");
    exit;
  } else if (empty($desc)) {
    $em = "Caption is required";
    header("Location: add_update.php?error=$em&$data");
    exit;
  } else {
    if (isset($_FILES['uimage']['name']) and !empty($_FILES['uimage']['name'])) {
      $img_name = $_FILES['uimage']['name'];
      $tmp_name = $_FILES['uimage']['tmp_name'];
      $error = $_FILES['uimage']['error'];

      if ($error === 0) {
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_to_lc = strtolower($img_ex);

        $allowed_exs = array('jpg', 'jpeg', 'png');
        if (in_array($img_ex_to_lc, $allowed_exs)) {
          $new_img_name = uniqid('', true) . '.' . $img_ex_to_lc;
          $img_upload_path = '../upload/' . $new_img_name;
          move_uploaded_file($tmp_name, $img_upload_path);

          // Insert into Database with type and date
          $date = date("Y-m-d H:i:s"); // Assuming date is the current date and time
          $sql = "INSERT INTO announcements(image, title, description, date) 
               VALUES(?,?,?,?)";
          $stmt = $conn->prepare($sql);
          $stmt->execute([$new_img_name, $title, $desc, $date]);

          header("Location: add_update.php?success=Announcement posted successfully");
          exit;
        } else {
          $em = "You can't upload files of this type";
          header("Location: add_update.php?error=$em&$data");
          exit;
        }
      } else {
        $em = "Unknown error occurred!";
        header("Location: add_update.php?error=$em&$data");
        exit;
      }
    } else {
      // No image file uploaded
      $em = "Image file is required";
      header("Location: add_update.php?error=$em&$data");
      exit;
    }
  }
}
