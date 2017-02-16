<?php session_start();
if(!isset($_SESSION['user'])){
  header('Location:index.php');
} ?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
  </script>
  <link rel="stylesheet" type="text/css" href="header.css">
  <script type="text/javascript" src="header.js" ></script>
  <link rel="stylesheet" type="text/css" href="sass-test/stylesheets/users.css">
  
</head>
<body>
<div class="user_list">
 <?php require 'connectdb.php'; ?>
 <?php require "header.php" ?>
<h1>Users List</h1>
	<table>
	<tr>
		<th>User Name</th>
		<th>Email</th>
		<th>Edit</th>
	</tr>
	
	<?php
      echo "<tr>";
	  $sql = 'SELECT * FROM users ';
	  $result = $conn->query($sql);
	  foreach ($result as $row)
	  { $user_id=$row['user_id'];
	    echo '<td>'.$row["name"].'</td>';
	    echo '<td>'.$row["email"].'</td>';
	    echo '<td><a class="edit" href="edit.php?id='.$user_id.'" >Edit Profile</a></td>';
	    echo "</tr>";
	    } 
	  ?></tr>
	  </table>
	  </div>
</body>
</html>