<?php session_start();
if(!isset($_SESSION['user'])){
  header('Location:index.php');
}
 ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
  </script>
  <link rel="stylesheet" type="text/css" href="header.css">
  <script type="text/javascript" src="header.js" ></script>
	<link rel="stylesheet" type="text/css" href="sass-test/stylesheets/positions.css">
</head>
<body>
<?php require 'connectdb.php'; ?>
<?php require "header.php" ?>
  <?php 
    if(isset($_POST["Defender"]))
	{   //to update positions in position table
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
  <h1>Positions</h1><br>
  <form action="positions.php" method="post" class="positions">
  <?php 
    $sql = 'SELECT * FROM position ';
    $result=$conn->query($sql);
    foreach ($result as $row)
    { if ($row["position_no"]==null) {
      //to avoid default position to be changeable
     continue;
    }
      echo '<p class="position-name">'.$row["position_name"].
            '</p><input type="text" name="'
	        .$row["position_name"].
	        '" value='.
	        $row["position_no"].'></br>';
	   }

	?>
	
	<input type="submit" id="update" value="Update">
	</form>
</body>
</html>