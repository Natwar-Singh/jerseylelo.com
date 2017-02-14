<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
  </script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="home-page.js" ></script>
	<link rel="stylesheet" type="text/css" href="home-page.css">
	<link href='//fonts.googleapis.com/css?family=Duru Sans' rel='stylesheet'>
  <link rel="stylesheet" type="text/css" href="header.css">
  <link rel="stylesheet" type="text/css" href="sass-test/stylesheets/login.css">
  <link rel="stylesheet" type="text/css" href="sass-test/stylesheets/signup.css">
</head>
<body>
  <?php require "header.php" ?>
  <?php require "login.php" ?>
  <?php require "signup.html" ?>
  <div id="content">
    <div id="info">
 	  <form action="tshirt.php" method="post">
 	    <select id="player" name="player">
           <option>SELECT PLAYER</option>
           <option>MALE</option>
           <option>FEMALE</option>
        </select>
        <input type="text" name="name" placeholder="ENTER YOUR NAME">
        <select id="position" name="position">
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