<?php session_start();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 <?php require 'connectdb.php'; ?>
 <?php $user_id=$_GET['id']; ?>
	 
	<?php 

	  if(isset($_POST["name"]))
	  {     if(isset($_POST['role'])){
	  	    $role_name=$_POST['role'];
		    $sql='UPDATE users
           SET role_id = (select role_id from role where role_name="'.$role_name.'")
           WHERE user_id ="'.$user_id.'"';
           $conn->query($sql);
		    }
		    
		    	$stmt = $conn->prepare('UPDATE users
		    SET name = :name,password=:password,email=:email,player=:player
		    WHERE user_id ="'.$user_id.'"');
		    	
		    $stmt->bindParam(':name',$_POST["name"]);
		    $stmt->bindParam(':password',$_POST["password"]);
		    $stmt->bindParam(':email',$_POST["email"]);
		    $stmt->bindParam(':player',$_POST["player"]);
		    $stmt->execute();
		  
	  }
	?> 
	 <?php  echo '<form action="edit.php?id='.  $user_id.'"  method="post">' ?>
	<?php 
	  
	  $sql = 'SELECT * FROM users where user_id="'.$user_id.'"';
	  $result=$conn->query($sql);
	  foreach ($result as $row)
	  {    $role_id=$row['role_id'];
           $state=$row['state'];
	  	  echo "Name:";
          echo '<input type="text" name="name"value="'.$row["name"].
	          '"></br>';
	      echo "Email:";
          echo '<input type="text" name="email"value="'.$row["email"].
	          '"></br>';
	      echo "password:";
          echo '<input type="text" name="password"value="'.$row["password"].
	          '"></br>';
	      echo "Player:";
          echo '<input type="text" name="player"value="'.$row["player"].
	          '"></br>';
	   }

	?>
	
	<?php 
	$sql = 'select role_name from users left join role on users.role_id=role.role_id where user_id= "'.$_SESSION['user'].'"';
    $result=$conn->query($sql);
    $set=$result->fetch();
    
    if($set['role_name']=="Admin"){
    	$sql='select role_name from role where role_id='.$role_id;
    	$result=$conn->query($sql);
        $set=$result->fetch();
        $role_name=$set['role_name'];
      if ($role_name=="Admin")
	    {
        echo '<label>Admin<input type="radio" name="role" value="Admin" checked></label>';

	    echo '<label>User<input type="radio" name="role" value="user" ></label><br>';
	    }
	    else
	    { 
	      echo '<label>Admin<input type="radio" name="role" value="Admin" ></label>';
	      echo '<label>User<input type="radio" name="role" value="user" checked ></label><br>';
	    }echo '<a href="update.php?id='.$user_id.'&action=1">delete</a>';
	    if($state=="active"){
	    echo '<a href="update.php?id='.$user_id.'&action=2">Block</a>' ;}
	    else{
	    echo '<a href="update.php?id='.$user_id.'&action=3">Activate</a>' ;}

	    
    }?>
    <input type="submit" name="submit" value="change">
	</form>
 </body>
 </html>