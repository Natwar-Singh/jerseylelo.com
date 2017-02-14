<div id="top">
<?php
if(isset($_SESSION['role'])){
         	if ($_SESSION['role']=="Admin") {
         		echo '<div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button"          data-toggle="dropdown">
            <div class="menu"></div><div class="menu"></div><div class="menu"></div>
            </button>
            <ul class="dropdown-menu">
              <li><a href="positions.php">Positions</a></li>
              <li><a href="users.php">Users</a></li>
            </ul>
          
         </div>';
         	}
         }
if (isset($_SESSION['user'])){
   echo '<a class="nav-button" href="image-gallery.php">Your Images</a>
   <a class="nav-button" href="edit.php?id='.$_SESSION["user"].'" >Edit Profile</a>
   <a class="nav-button" href="logout.php">LogOut</a>'; }
  else{ 
   echo '<a  class="nav-button" id="login_link">LogIn</a>
         <a  class="nav-button" id="signup_link">SignUp</a>';}

    
 ?>
</div>