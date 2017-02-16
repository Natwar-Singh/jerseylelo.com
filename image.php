<?php 
      if($player == "FEMALE"){
       $jpg_image = imagecreatefromjpeg('female.jpg');
       $count = strlen($text);
       $x = 751 + 16 * (6 - $count);
        $y = 480;
        $xn = 775;
        $yn = 610;
       if ($position_no < 10) {
        $xn = 810;
          
       }
       }
      else
      {
      $jpg_image = imagecreatefromjpeg('male.jpg');
        $count = strlen($text);
       $x = 725 + 16 * (6 - $count);
        $y = 440;
        $xn = 740;
        $yn = 580;
       if ($position_no < 10) {
        $xn = 785;
          
       }}

      // Allocate A Color For The Text
      $white = imagecolorallocate($jpg_image, 150, 150, 150);
      // Set Path to Font File
      $font_path = '/var/www/jerseylelo.com/public-html/verdana.ttf';
      // Print Text On Image
      imagettftext($jpg_image, 40, 0, $x, $y, $white, $font_path, $text);
      imagettftext($jpg_image, 100, 0, $xn, $yn, $white, $font_path, $position_no);
      // Send Image to Browser
      $imgname="images/".$name.$position_no.$player.$user_id;
      imagejpeg($jpg_image, $imgname, 100);
      // Clear Memory
      imagedestroy($jpg_image);
    ?> 