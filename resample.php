<?php

    $image = file_get_contents("test.jpg");
    $source = imagecreatefromstring($image);

    $width = imagesx($source);
    $height = imagesy($source);

    $thumb = imagecreatetruecolor(80,60);
    imagecopyresampled($thumb, $source, 0,0,0,0,80,60,$width,$height);
    imagejpeg($thumb, "newthumb.jpg");

    echo "image created";

?>
