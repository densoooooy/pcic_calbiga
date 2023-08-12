<?php
$servername = "sql6.freemysqlhosting.net";
$username = "sql6636176";
$password = "m8lDVIzAW7";


try {
  $conn = new PDO("mysql:host=$servername;dbname=sql6636176", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}



