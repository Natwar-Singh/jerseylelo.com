<?php
  $servername = "localhost";
  $username = "root";
  $passrd = "root";
  try 
  {
    $conn = new PDO("mysql:host=$servername;dbname=football", $username, $passrd);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $e)
  {
    echo "Connection failed: " . $e->getMessage();
  }
?>