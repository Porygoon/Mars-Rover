<?php
header ("Content-type: image/png");
$sprite = imagecreatefrompng("rover.png");
imagealphablending($sprite, false);
imagesavealpha($sprite, true);


$direction = $_GET['direction'];

if ($direction == 'N') {
    $sprite = imagerotate($sprite, 0, 0);
    imagepng($sprite);
} elseif ($direction == 'S') {
    $sprite = imagerotate($sprite, 180, 0);
    imagealphablending($sprite, false);
    imagesavealpha($sprite, true);
    imagepng($sprite);
} elseif ($direction == 'O') {
    $sprite = imagerotate($sprite, 90, 0);
    imagealphablending($sprite, false);
    imagesavealpha($sprite, true);
    imagepng($sprite);
} else {
    $sprite = imagerotate($sprite, 270, 0);
    imagealphablending($sprite, false);
    imagesavealpha($sprite, true);
    imagepng($sprite);
}