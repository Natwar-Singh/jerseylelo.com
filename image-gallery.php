<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
  </script>
  <link rel = "stylesheet" type = "text/css" href = "header.css">
  <script type = "text/javascript" src = "header.js" ></script>
	<link rel = "stylesheet" type = "text/css" href = "sass-test/stylesheets/image-gallery.css">
</head>
<body>

<?php require "connectdb.php" ;
  require "header.php";
  echo '<h1>Image Gallery</h1>';
$sql = 'SELECT url,f_id FROM images where user_id ="'.$_SESSION['user'].'"';
$result = $conn->query($sql);
    foreach ($result as $row)
      {   
        $url = $row['url'];
        $f_id = $row['f_id'];
        echo '<a class="image" href="show.php?id='.$f_id.'"><img src='.$url.'></img></a>';
      }

?>
<img src="" >
</body>
</html>