<?php
require_once '../modele/RoverModele.php';

$X = isset($_POST['X']) ? $_POST['X'] : 5;
$Y = isset($_POST['Y']) ? $_POST['Y'] : 5;
$direction = isset($_POST['directionRover']) ? $_POST['directionRover'] : 'N';
$YObstacle = isset($_POST['YObstacleSave']) ? $_POST['YObstacleSave'] : rand(1, 9);
$XObstacle = isset($_POST['XObstacleSave']) ? $_POST['XObstacleSave'] : rand(1, 9);
$XAlien = isset($_POST['XAlienSave']) ? $_POST['XAlienSave'] : rand(1, 9);
$YAlien = isset($_POST['YAlienSave']) ? $_POST['YAlienSave'] : rand(1, 9);
$scoreSave = isset($_POST['scoreSave']) ? $_POST['scoreSave'] : 0;

$positionRover = ['X' => $X, 'Y' => $Y];
$directionRover = $direction;
$rover = new Rover($positionRover, $directionRover);

$positionAlien = ['X' => $XAlien, 'Y' => $YAlien];
$alien = new Alien($positionAlien);
$positionAlien = $alien->getPositionAlien();

    // fais des trucs en fonction du $_POST
if (isset($_POST['direction'])) {
    if($_POST['direction'] == "↑") {
        $rover->commandes(['f']);
    } else if ($_POST['direction'] == "←") {
        $rover->commandes(['l']);
    } else if ($_POST['direction'] == "↓") {
        $rover->commandes(['b']);
    } else if ($_POST['direction'] == "→") {
        $rover->commandes(['r']);
    }
}


if($rover->getPositionY() <  1) {
    $rover->changePositionY(10);
}

if($rover->getPositionY() >  10) {
    $rover->changePositionY(1);
}

if($rover->getPositionX() <  0) {
    $rover->changePositionX(9);
}

if($rover->getPositionX() >  9) {
    $rover->changePositionX(0);
}

if ($rover->getPositionY() == $YObstacle && $rover->getPositionX() == $XObstacle) {
    $rover->changePositionX($positionRover['X']);
    $rover->changePositionY($positionRover['Y']);

    echo "<script>alert('Le rover est cassé \\\\o/');</script>"; //Escapeception
}

if ($positionAlien['Y'] == $rover->getPositionY() && $positionAlien['X'] == $rover->getPositionX()) {
    $scoreSave = $scoreSave +1;

    $XAlien = rand(1, 9);
    $YAlien = rand(1, 9);
}

$positionRover = $rover->getPosition();
$positionAlien = $alien->getPositionAlien();

include '../vue/RoverView.php';
