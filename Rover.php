<?php
class Rover
{

    private $position;
    private $direction;

    public function __construct($positionRover, $directionRover)
    {
        $this->position = $positionRover;
        $this->direction = $directionRover;
    }

    public function commandes($commandes)
    {
        $roverDirection = $this->direction;
        $nombreDeCommande = count($commandes);

        for ($i = 0; $i < $nombreDeCommande; $i++) {
            // Je change ma position en fonction des commandes que j'ai recus
            if ($commandes == []) {
                $this->position['X'] = 0;
                $this->position['Y'] = 0;
            } else if ($commandes[$i] == 'f' && $roverDirection == 'N') {
                $this->position['Y'] = $this->position['Y'] - 1;
            } else if ($commandes[$i] == 'b' && $roverDirection == 'N') {
                $this->position['Y'] = $this->position['Y'] + 1;
            } else if ($commandes[$i] == 'f' && $roverDirection == 'S') {
                $this->position['Y'] = $this->position['Y'] + 1;
            } else if ($commandes[$i] == 'b' && $roverDirection == 'S') {
                $this->position['Y'] = $this->position['Y'] - 1;
            } else if ($commandes[$i] == 'f' && $roverDirection == 'E') {
                $this->position['X'] = $this->position['X'] + 1;
            } else if ($commandes[$i] == 'b' && $roverDirection == 'E') {
                $this->position['X'] = $this->position['X'] - 1;
            } else if ($commandes[$i] == 'f' && $roverDirection == 'O') {
                $this->position['X'] = $this->position['X'] - 1;
            } else if ($commandes[$i] == 'b' && $roverDirection == 'O') {
                $this->position['X'] = $this->position['X'] + 1;
            } else if ($commandes[$i] == 'l' && $roverDirection == 'N') {
                $this->direction = 'O';
            } else if ($commandes[$i] == 'r' && $roverDirection == 'N') {
                $this->direction = 'E';
            } else if ($commandes[$i] == 'l' && $roverDirection == 'S') {
                $this->direction = 'O';
            } else if ($commandes[$i] == 'r' && $roverDirection == 'S') {
                $this->direction = 'E';
            } else if ($commandes[$i] == 'l' && $roverDirection == 'O') {
                $this->direction = 'S';
            } else if ($commandes[$i] == 'r' && $roverDirection == 'O') {
                $this->direction = 'N';
            } else if ($commandes[$i] == 'l' && $roverDirection == 'E') {
                $this->direction = 'N';
            } else if ($commandes[$i] == 'r' && $roverDirection == 'E') {
                $this->direction = 'S';
            }
        }
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function getDirection()
    {
        $roverDirection = $this->direction;
        return $roverDirection;
    }

    public function changeDirectionY($newY)
    {
        $this->position['Y'] = $newY;
        return $this->position;
    }

    public function changeDirectionX($newX)
    {
        $this->position['X'] = $newX;
        return $this->position;
    }

    public function getDirectionY()
    {
        return $this->position['Y'];
    }

    public function getDirectionX()
    {
        return $this->position['X'];
    }

}
?>

<html>
<link rel="stylesheet" type="text/css" href="Rover.css">
    <body>
    <form method="post" action="" id="form">
        <input type="submit" value="↑" name="direction"/><br/>
        <input type="submit" value="←" name="direction"/>
        <input type="submit" value="↓" name="direction"/>
        <input type="submit" value="→" name="direction"/><br/>

<?php

$X = isset($_POST['X']) ? $_POST['X'] : 5;
$Y = isset($_POST['Y']) ? $_POST['Y'] : 5;
$direction = isset($_POST['directionRover']) ? $_POST['directionRover'] : 'N';
$YObstacle = isset($_POST['YObstacleSave']) ? $_POST['YObstacleSave'] : rand(1, 10);
$XObstacle = isset($_POST['XObstacleSave']) ? $_POST['XObstacleSave'] : rand(1, 10);

$positionRover = ['X' => $X, 'Y' => $Y];
$directionRover = $direction;
$rover = new Rover($positionRover, $directionRover);

if (isset($_POST['direction'])) {
    if($_POST['direction'] == "↑") {
        $rover->commandes(['f']);
        echo ("direction: ".$rover->getDirection().'<br/>');
        echo ("postion: ");
        print_r($rover->getPosition());
    } else if ($_POST['direction'] == "←") {
        $rover->commandes(['l']);
        echo ("direction: ".$rover->getDirection().'<br/>');
        echo ("postion: ");
        print_r($rover->getPosition());
    } else if ($_POST['direction'] == "↓") {
        $rover->commandes(['b']);
        echo ("direction: ".$rover->getDirection().'<br/>');
        echo ("postion: ");
        print_r($rover->getPosition());
    } else if ($_POST['direction'] == "→") {
        $rover->commandes(['r']);
        echo ("direction: ".$rover->getDirection().'<br/>');
        echo ("postion: ");
        print_r($rover->getPosition());
    }
}


//if($positionRover['Y'] <=  1) {
//    $rover->changeDirectionY(9);
//    echo 'ez1: ';
//    print_r($positionRover);
//}

//if($positionRover['Y'] >=  9) {
//    $rover->changeDirectionY(1);
//    echo 'ez2: ';
//    print_r($positionRover);
//}

//if($positionRover['X'] <=  1) {
//    $rover->changeDirectionX(8);
//    echo 'ez3: ';
//    print_r($positionRover);
//}

//if($positionRover['X'] >=  9) {
//    $rover->changeDirectionX(1);
//    echo 'ez4: ';
//    print_r($positionRover);
//}

if ($rover->getDirectionY() == $YObstacle && $rover->getDirectionX() == $XObstacle) {
    $rover->changeDirectionX($positionRover['X']);
    $rover->changeDirectionY($positionRover['Y']);
}

$ligne = range(1, 10);
$colonne = range(1, 10);

foreach ($ligne as $ligneIndex) {
    $grille[$ligneIndex] = $colonne;
}

$positionRover = $rover->getPosition();
$grille[$positionRover['Y']][$positionRover['X']] = '<img src="rover.png"/>';
$grille[$YObstacle][$XObstacle] = '<center>\o/</center>';



?>
    <input type="hidden" value="<?php echo $positionRover['X']; ?>" name="X"/>
    <input type="hidden" value="<?php echo $positionRover['Y']; ?>" name="Y"/>
    <input type="hidden" value="<?php echo $rover->getDirection(); ?>" name="directionRover"/>
    <input type="hidden" value="<?php echo $YObstacle; ?>" name="YObstacleSave"/>
    <input type="hidden" value="<?php echo $XObstacle; ?>" name="XObstacleSave"/>
    </form>


    <?php foreach ($grille as $ligne) : ?>
        <?php foreach ($ligne as $case) : ?>
                <div id="test3"><?php echo($case);?></div>
        <?php endforeach; ?>
        <br />
    <?php endforeach; ?>

    </body>
</html>

