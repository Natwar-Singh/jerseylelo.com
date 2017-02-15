<?php
if(isset($_POST["email"])){
  require "connectdb.php";
function varify($email,$password){
    GLOBAL $conn;
    $match= false;
    $sql = 'SELECT * FROM users where email = "'.$email.'" and password = "'.md5($password).'"';
    $result=$conn->query($sql);
    foreach ($result as $row)
      { if($row['state']=="active"){
        $match=true;
      }

        $_SESSION['user']=$row['user_id'];
        $role_id=$row['role_id'];
      }
      if ($match==true) {
        return $role_id;
      }
      else
      {
        return $match;
      }

      }
   
    $email = $_POST["email"];
    $password = $_POST["password"];
    
}
    
?>
<div id="login">
<a class="cross">&#x274C;</a>
<?php

if(isset($_POST["email"])){
$role_id=varify($email,$password);
  if ($role_id==false) {
    echo "<p id='error'>Email or password not matched</p>";
  }
  else{
    $sql = 'SELECT * FROM role where role_id= "'.$role_id.'"';
    $result=$conn->query($sql);
    $set=$result->fetch();
    echo $_SESSION['role']=$set['role_name'];
    
    header('Location: index.php');
    
  }
  }$conn=null;
 ?>
<div id="form">
<form action="index.php" method="post" ><br>


<input type="email" name="email" placeholder="Enter Email Address" class="login"><br>

<input type="password" name="password" placeholder="Password" class="login"><br>
<input type="submit" name="submit" value="LOG IN" class="login" id="login_button">
</form>
</div></div>

