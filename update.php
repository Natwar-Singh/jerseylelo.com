<?php
require "connectdb.php" ;
 //to delete user
if ($_GET['action'] == 1) {
	$sql = 'delete from users where user_id='.$_GET['id'];
 	$conn->query($sql);
 }
   //to block users;
else if ($_GET['action'] == 2){
	$sql = 'update users set state="blocked" where user_id='.$_GET['id'];
	
	$conn->query($sql);
    }
    //to activate users
    else{
    $sql ='update users set state="active" where user_id='.$_GET['id'];
    echo $sql;
	
	$conn->query($sql);	
    }

header('Location: users.php');
?>