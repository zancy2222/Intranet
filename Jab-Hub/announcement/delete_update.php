<?php
session_start();
include("../database.php");

if (isset($_POST['delete'])) {
  $id = $_POST['delete'];

  $query = "DELETE FROM announcements WHERE id='$id'";
  $query_run = mysqli_query($conn, $query);

  if ($query_run) {
    header("Location: ../dashboard/admin.php?success=Post deleted successfully");
    exit();
  } else {
    header("Location: ../dashboard/admin.php?error=Post deleted failed");
    exit();
  }
}
