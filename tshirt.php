<?php
session_start();
if(!isset($_SESSION['user'])){
  header('Location:index.php');
}
?>

<?php 
  $player = $_POST['player'];
  if ($player == "SELECT PLAYER") {
    $player = "MALE";
  }
  $name = strtoupper($_POST['name']);
  $position = $_POST['position'];
  $user_id = $_SESSION['user'];
  require 'connectdb.php';
  $sql = "use football";
  $conn->query($sql);
  $text = $name;
  //getting position no from table
  $sql = 'SELECT position_no FROM position where position_name = "'.$position.'"';
  $result = $conn->query($sql);
  foreach ($result as $row)
    {   
      $position_no=$row['position_no'];
    }
     // creating image url
      $imgname="images/".$name.$position_no.$player.$user_id;
    
  
  $sql = 'SELECT f_id FROM images where url ="'.$imgname.'"and user_id = "'.$user_id.'"';
    $result = $conn->query($sql);
    $set = $result->fetch();
    print_r($set);
    if(isset($set['f_id'])){echo "hai";
     //if url already exists then to prevent
      }
    else{
      //to create image including image processing code
       require 'image.php';
    //inserting image information into image
  $stmt = $conn->prepare("INSERT INTO images (user_id, url,date) 
    VALUES (:user_id, :url, :date)");
  $stmt->bindParam(':user_id', $user_id);
  $stmt->bindParam(':url', $imgname);
  $date = new DateTime();
  $stmt->bindParam(':date',$date->format('Y-m-d H:i:s'));
  $stmt->execute();
      }
      //geting the image id to show that image
  $sql = 'SELECT f_id FROM images where url ="'.$imgname.'"';
    $result = $conn->query($sql);
    $set = $result->fetch();
    $id = $set['f_id'];
    $conn = null;
  header('Location: show.php?id='.$id);
?>
