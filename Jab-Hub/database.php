<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Intranet";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_errno) {
  die("Connection Failed. " . $conn->connect_error);
}

return $conn;
