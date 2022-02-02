<?php

//    $image = imagecreatetruecolor(80,60);

    $image = imagecreatetruecolor(80, 60);

    $bc = imagecolorallocate($image, 255, 255, 255);
    $fc = imagecolorallocate($image, 0, 0, 0);

    imagefilledrectangle($image, 0, 0, 80,60, $bc);
    imagestring($image, 5, 20, 5, "No", $fc);
    imagestring($image, 5, 10, 20,"Image", $fc);
    imagestring($image, 5, 0, 35, "Available", $fc);

    imagejpeg($image, "noimage.jpg");
    imagedestroy($image);

    echo "Image Created!";


?>
