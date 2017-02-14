<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="sass-test/stylesheets/positions.css">
</head>
<body>
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
</body>
</html>