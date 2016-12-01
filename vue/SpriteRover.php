<?php
header ("Content-type: image/png");
$sprite = imagecreatefrompng("rover.png");
imagealphablending($sprite, false);
imagesavealpha($sprite, true);

$direction = $_GET['direction'];


if ($direction == 'S') {
    $degree = 180;
} elseif ($direction == 'O') {
    $degree = 90;
} elseif ($direction == 'E') {
    $degree = 270;
} else {
    $degree = 0;
}
$sprite = imagerotate($sprite, $degree, 0);
imagealphablending($sprite, false);
imagesavealpha($sprite, true);
imagepng($sprite);