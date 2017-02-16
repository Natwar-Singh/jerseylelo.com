<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
  <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
  </script>
  <link rel="stylesheet" type="text/css" href="header.css">
  <script type = "text/javascript" src="header.js" ></script>
  <script type = "text/javascript" src="home-page.js" ></script>
  
	<link rel = "stylesheet" type="text/css" href="home-page.css">
	<link href = '//fonts.googleapis.com/css?family=Duru Sans' rel='stylesheet'>
  
  <link rel = "stylesheet" type="text/css" href="sass-test/stylesheets/login.css">
  <link rel = "stylesheet" type="text/css" href="sass-test/stylesheets/signup.css">
</head>
<body>
  <?php require "header.php" ?>
  <?php require "login.php" ?>
  <?php require "signup.html" ?>
  <?php 
  if (isset($_GET['already'])) {
    echo '<span id="already"></span>';
  }
  ?>

  <div id = "content">
    <div id = "info">
    <?php
    if(isset($_SESSION['user'])) 
      {
        echo '<form action = "tshirt.php" method="post">';
      }
      else
      {
        echo '<form action = "index.php" method = "post">';
      }
      if (isset($_POST['player'])) {
        echo '<span id = "login-first"></span>';
      }

      ?>
 	  
 	    <select id = "player" name = "player" required>
           <option>SELECT PLAYER</option>
           <option>MALE</option>
           <option>FEMALE</option>
        </select>
        <input type="text" name="name" placeholder="ENTER YOUR NAME" required>
        <select id="position" name="position" required>
          <option>SELECT YOUR POSITION</option>
          <option>Defender</option>
          <option>Striker</option>
          <option>Midfilder</option>
          <option>Coach</option>
          <option>Goalkeeper</option>
        </select>
        <input type="submit" value="KICK OFF" id="kick-off">
       </form>
    </div>
    <div id="tagline">
      <p>A NEW PLAYING FIELD AWAITS YOU AND SO DOES </p>
      <p><b>YOUR OWN <span>JERSEY</span></b></p>
    </div>
 </div>
</body>
</html>