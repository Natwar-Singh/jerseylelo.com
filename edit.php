<?php session_start();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
  </script>
  <link rel="stylesheet" type="text/css" href="header.css">
  <script type="text/javascript" src="header.js" ></script>
    <link rel="stylesheet" type="text/css" href="sass-test/stylesheets/edit.css">
 </head>
 <body>
   <?php require 'connectdb.php'; ?>
    <?php require 'header.php'; ?>
   <?php $user_id=$_GET['id']; ?>
   <?php 
     if(isset($_POST["name"]))
	   { 
	     if(isset($_POST['role']))
	     {
	  	   $role_name=$_POST['role'];
		   $sql='UPDATE users
           SET role_id = (select role_id from role where role_name="'.$role_name.'")
           WHERE user_id ="'.$user_id.'"';
           $conn->query($sql);
		  }
		  if(!$_POST['password']==null)
	     {
	  	   $password=md5($_POST['password']);
		   $sql='UPDATE users
           SET password ="'.$password.'" 
           WHERE user_id ="'.$user_id.'"';
           $conn->query($sql);
		  }
		  $stmt = $conn->prepare('UPDATE users
		  SET name = :name,email=:email,player=:player
		  WHERE user_id ="'.$user_id.'"');
		  $stmt->bindParam(':name',$_POST["name"]);
		  $stmt->bindParam(':email',$_POST["email"]);
		  $stmt->bindParam(':player',$_POST["player"]);
		  $stmt->execute();
		}
	?> 
	<?php  echo '<form id="content"action="edit.php?id='.  $user_id.'"  method="post">' ?>
	<h1>Edit Profile</h1>
	<?php 
	  $sql = 'SELECT * FROM users where user_id="'.$user_id.'"';
	  $result=$conn->query($sql);
	  foreach ($result as $row)
	  {    
	  $role_id=$row['role_id'];
      $state=$row['state'];
	  echo "<P class='edit-field'>Name:</p>";
      echo '<input type="text" class="edit-input" name="name"value="'.$row["name"].
	       '"></br>';
	  echo "<P class='edit-field'>Email:</p>";
      echo '<input type="text" class="edit-input" name="email"value="'.$row["email"].
	       '"></br>';
	  echo "<P class='edit-field'>password:</p>";
      echo '<input type="text" class="edit-input"  name="password"
	       ></br>';
	  echo "<P class='edit-field'>Player:</p>";
      echo '<input type="text" class="edit-input" name="player"value="'.$row["player"].
	          '"></br>';
	  }

	?>
	
	<?php echo "<P class='edit-field'>Role:</p>";
	  $sql = 'select role_name from users left join role on users.role_id=role.role_id where user_id= "'.$_SESSION['user'].'"';
      $result=$conn->query($sql);
      $sets=$result->fetch();
      if($sets['role_name']=="Admin")
      {
    	$sql='select role_name from role where role_id='.$role_id;
    	$result=$conn->query($sql);
        $set=$result->fetch();
        $role_name=$set['role_name'];
        if ($role_name=="Admin")
	    {
          echo '<select  name="role" class="edit-input">
           <option selected="selected">Admin</option>
           <option >User</option>
           </select>';
	    }
	    else
	    { 
	      echo '<select  name="role" class="edit-input">
           <option>Admin</option>
           <option selected="selected">User</option>
           </select>';
	    }
	    
      }
    ?>
        
    <input type="submit" name="submit" value="Apply" class="permission">
	
	<?php 
	if ($sets['role_name']=="Admin"){
		echo '<a href="update.php?id='.$user_id.'&action=1" class="permission">delete</a>';
	    if($state=="active")
	    {
	      echo '<a href="update.php?id='.$user_id.'&action=2" class="permission">Block</a>' ;
	    }
	    else
	    {
	      echo '<a href="update.php?id='.$user_id.'&action=3" class="permission">Activate</a>' ;
	    }
	  }
		?></form>
 </body>
 </html>