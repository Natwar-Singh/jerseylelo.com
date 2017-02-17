<div id = "top">
<?php
if(isset($_SESSION['role'])){
         	if ($_SESSION['role'] == "Admin") {
               //dropdown menu for Admin to users list and positions
         		echo '<div class = "wrap">
                  <div class = "icon">
                  <div class = "menu"></div><div class = "menu"></div><div class = "menu"></div>
                  </div>
                  <span class = "dropdown-content">
                  <a href = "positions.php" class = "dropdown-element">Positions</a>
                  <a href = "users.php" class = "dropdown-element">Users</a>
                  </span>
                  </div>';
         	}
         }
if (isset($_SESSION['user'])){
   //to select login and logout buttons
   echo '<a class="nav-button" href="image-gallery.php">Your Images</a>
   <a class="nav-button" href="edit.php?id='.$_SESSION["user"].'" >Edit Profile</a>
   <a class="nav-button" href="logout.php">LogOut</a>'; }
  else{ 
   echo '<a  class="nav-button" id="login_link">LogIn</a>
         <a  class="nav-button" id="signup_link">SignUp</a>';}

    
 ?>
</div>