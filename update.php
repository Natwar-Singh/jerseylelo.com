<?php
require "connectdb.php" ;
if ($_GET['action']==1) {
	$sql='delete from users where user_id='.$_GET['id'];
 	$conn->query($sql);
 }

else if ($_GET['action']==2){
	$sql='update users set state="blocked" where user_id='.$_GET['id'];
	
	$conn->query($sql);
    }
    else{
    $sql='update users set state="active" where user_id='.$_GET['id'];
	
	$conn->query($sql);	
    }

header('Location: users.php');
?>