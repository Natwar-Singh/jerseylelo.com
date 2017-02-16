<?php
session_start();
if(!isset($_SESSION['user'])){
  header('Location:index.php');
}
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
<meta property="og:image" content=<?php echo $set['url']?>>
<meta property="og:image:width" content="600">
<meta property="og:image:height" content="315">
<meta property="og:site_name" content="jerseylelo.com">
<meta property="og:url" content="https://www.jerseylelo.com/show.php">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
  </script>
  <link rel="stylesheet" type="text/css" href="header.css">
  <script type="text/javascript" src="header.js" ></script>
	<title></title>

	<link rel="stylesheet" type="text/css" href="sass-test/stylesheets/show.css">
</head>

<?php
echo '<body style="background-image: url('.$set['url'].');">';?>
<?php require "header.php" ?>
 
<a class="twitter-share-button"
  href="http://twitter.com/share?url=http://jerseylelo.com/show.php"
  >
Tweet
</a>
<a download="custom-filename.jpg" id="download" href=<?php echo $set['url'] ?>  title="ImageName">
    download
</a>

</body>
</html>
