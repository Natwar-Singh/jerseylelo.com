<?php
session_start();
require "connectdb.php";
$f_id=$_GET['id'];
$sql = 'SELECT url FROM images where f_id ="'.$f_id.'"';
    $result=$conn->query($sql);
    $set=$result->fetch();
    $set['url']; 
?>
<!DOCTYPE html>
<html>
<head>
<meta property="og:image" content=<?php $set['url']?>>
<meta property="og:image:width" content="600">
<meta property="og:image:height" content="315">
<meta property="og:site_name" content="jerseylelo.com">
<meta property="og:url" content="https://www.jerseylelo.com/show.php">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="home-page.js" ></script>
	<title></title>
	<link rel="stylesheet" type="text/css" href="header.css">
	<link rel="stylesheet" type="text/css" href="sass-test/stylesheets/show.css">
</head>
<body>
<?php


echo '<body style="background-image: url('.$set['url'].');">';?>
<?php require "header.php" ?>
 
<a class="twitter-share-button"
  href="http://twitter.com/share?url=http://jerseylelo.com/show.php"
  >
Tweet
</a>
<a download="custom-filename.jpg" href=<?php echo $set['url'] ?>  title="ImageName">
    download
</a>

</body>
</html>
