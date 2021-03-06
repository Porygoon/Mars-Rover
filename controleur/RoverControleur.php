<?php
require_once '../modele/RoverModele.php';
require_once '../modele/MapModele.php';
require_once '../modele/ObstacleModele.php';

function randWithoutNumber ($excpetedNumber, $min, $max) {
    $number = rand($min, $max);
    while (in_array($excpetedNumber, array($number))) {
        $number = rand($min, $max);
    }
    return $number;
}

function run() {
    $messages = null;
    $X = isset($_POST['X']) ? $_POST['X'] : 5;
    $Y = isset($_POST['Y']) ? $_POST['Y'] : 5;
    $direction = isset($_POST['directionRover']) ? $_POST['directionRover'] : 'N';
    $YObstacle = isset($_POST['YObstacleSave']) ? $_POST['YObstacleSave'] : randWithoutNumber(5, 1, 9);
    $XObstacle = isset($_POST['XObstacleSave']) ? $_POST['XObstacleSave'] : randWithoutNumber(5, 1, 9);
    $XAlien = isset($_POST['XAlienSave']) ? $_POST['XAlienSave'] : randWithoutNumber(5, 1, 9);
    $YAlien = isset($_POST['YAlienSave']) ? $_POST['YAlienSave'] : randWithoutNumber(5, 1, 9);
    $scoreSave = isset($_POST['scoreSave']) ? $_POST['scoreSave'] : 0;

    $positionRover = ['X' => $X, 'Y' => $Y];
    $directionRover = $direction;
    $rover = new Rover($positionRover, $directionRover);

    $positionAlien = ['X' => $XAlien, 'Y' => $YAlien];
    $alien = new Alien($positionAlien);
    $positionAlien = $alien->getPositionAlien();

    $positionObstacle = ['X' => $XObstacle, 'Y' => $YObstacle];
    $obstacle = new Obstacle($positionObstacle);
    $positionObstacle = $obstacle->getPositionObstacle();

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

    if ($rover->getPositionY() == $YObstacle && $rover->getPositionX() == $XObstacle) {
        $rover->changePositionX($positionRover['X']);
        $rover->changePositionY($positionRover['Y']);

        echo "<script>alert('Le rover est cassé \\\\o/');</script>"; //Escapeception
    }

    if ($positionAlien['Y'] == $rover->getPositionY() && $positionAlien['X'] == $rover->getPositionX()) {
        $scoreSave = $scoreSave +1;
        $messages = 'Tu as tué un alien, bravo !';

        $XAlien = randWithoutNumber($rover->getPositionX(), 1, 9);
        $YAlien = randWithoutNumber($rover->getPositionY(), 1, 9);
    }

    $positionRover = $rover->getPosition();
    $positionAlien = $alien->getPositionAlien();

    $longueur = range(10, 1);
    $largeur = range(1, 10);
    $map = new Map($longueur, $largeur, $rover, $alien, $obstacle);
    $map->validatePosition($rover->getPositionY(), $rover->getPositionX());

    return [
        'map' => $map,
        'scoreSave' => $scoreSave,
        'YObstacle' => $YObstacle,
        'XObstacle' => $XObstacle,
        'XAlien' => $XAlien,
        'YAlien' => $YAlien,
        'messages' => $messages
    ];
}

$current = run();
$map = $current['map'];
$scoreSave = $current['scoreSave'];
$YObstacle = $current['YObstacle'];
$XObstacle = $current['XObstacle'];
$XAlien = $current['XAlien'];
$YAlien = $current['YAlien'];
$messages = $current['messages'];

$longueur = range(10, 1);
$largeur = range(1, 10);


include '../vue/RoverView.php';
