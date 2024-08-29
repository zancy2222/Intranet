<?php

function getUserById($id, $db)
{
  $sql = "SELECT * FROM users WHERE id = ?";
  $stmt = $db->prepare($sql);
  $stmt->bind_param("i", $id);
  $stmt->execute();

  $result = $stmt->get_result();

  if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
    return $user;
  } else {
    return 0;
  }
}
