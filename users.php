<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="sass-test/stylesheets/users.css">
</head>
<body>
<div class="user_list">
<?php require 'connectdb.php'; ?>
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