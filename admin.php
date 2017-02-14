<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <link rel="stylesheet" type="text/css" href="sass-test/stylesheets/admin.css">
</head>
<body>
  <h1>Admin</h1>
  <?php require 'connectdb.php'; ?>
  <?php 
    if(isset($_POST["Defender"]))
	{
      $sql = 'SELECT * FROM position ';
      $result=$conn->query($sql);
      foreach ($result as $row) 
      {
        $stmt = $conn->prepare('UPDATE position
        SET position_no = :position_no
        WHERE position_name ="'.$row["position_name"].'"');	
        $stmt->bindParam(':position_no',$_POST[$row["position_name"]]);
        $stmt->execute();
      }
	}
	?>
  <form action="admin.php" method="post" class="positions">
  <?php 
    echo "<h3>Position:</h3><br>";
    $sql = 'SELECT * FROM position ';
    $result=$conn->query($sql);
    foreach ($result as $row)
    {
      echo '<p class="position-name">'.$row["position_name"].
            '</p><input type="text" name="'
	        .$row["position_name"].
	        '" value='.
	        $row["position_no"].'></br>';
	   }

	?>
	 
	<input type="submit" value="Update">
	</form>
	<div class="user_list">
	<h3>Users:</h3>
	<table>
	<tr>
		<th>User Name</th>
		<th>Email</th>
		<th>Edit</th>
	</tr>
	
	<?php
      echo "<tr>";
	  $sql = 'SELECT * FROM users ';
	  $result=$conn->query($sql);
	  foreach ($result as $row)
	  { $user_id=$row['user_id'];
	    echo '<td>'.$row["name"].'</td>';
	    echo '<td>'.$row["email"].'</td>';
	    echo '<td><a class="nav-button" href="edit.php?id='.$user_id.'" >Edit Profile</a></td>';
	    echo "</tr>";
	    } 
	  ?></tr>
	  </table>
	  </div>
</body>
</html>