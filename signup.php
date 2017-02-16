<?php
  session_start();
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $role_id = 2;
  $player = $_POST['player'];
  require "connectdb.php";
  $stmt = $conn->prepare("INSERT INTO users (name,email,password,player,role_id,state) 
    VALUES (:name, :email, :password, :player,:role_id,:state)");
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':password',$password);
  $stmt->bindParam(':player', $player);
  $stmt->bindParam(':role_id', $role_id);
  $state="active";
  $stmt->bindParam(':state', $state);
  $stmt->execute();
  echo $password;
  $sql = 'SELECT * FROM users where email = "'.$email.'" and password = "'.$password.'"';
  $result = $conn->query($sql);
  foreach ($result as $row)
  {   
    $_SESSION['user'] = $row['user_id'];
  }
  header('Location: index.php');    
  $conn = null;
?>