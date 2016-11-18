<?php
use PHPUnit\Framework\TestCase;

require_once 'modele/RoverModele.php';
require_once 'modele/MapModele.php';
require_once 'modele/ObstacleModele.php';

class RoverTest extends TestCase
{

    public function testNeBougePasDeSaPosisionInitialeQuandAucuneCommande()
    {
        $positionRover = ['X' => 0, 'Y' => 0];
        $directionRover = 'N';
        $rover = new Rover($positionRover, $directionRover);
        $rover->commandes(['f']);

        $this->assertEquals($positionRover, $rover->getPosition());
    }

    public function arrayGotIntValue ($array)
    {
        foreach ($array as $value)
        {
            if(!is_int($value))
            {
                return false;
            }
        }
        return true;
    }

    public function onlyFBLRasInput ($array)
    {
        foreach ($array as $value)
        {
            if($value != 'F' || $value != 'B' || $value != 'L' || $value != 'R')
            {
                return false;
            }
        }
        return true;
    }


    public function testXEtYSontDesEntiers ()
    {
        $positionRover = ['X' => 0, 'Y' => 0];

        $this->assertTrue($this->arrayGotIntValue($positionRover));
    }

    public function testGetPositionNestPasVide ()
    {
        $positionRover = ['X' => 0, 'Y' => 0];
        $directionRover = 'N';
        $rover = new Rover($positionRover, $directionRover);
        $rover->commandes([]);

        $this->assertNotEmpty($rover->getPosition());
    }

    public function testGetPositionYRetourneBienLaPositionDuRoverEnY ()
    {
        $positionRover = ['X' => 0, 'Y' => 0];
        $directionRover = 'N';
        $rover = new Rover($positionRover, $directionRover);

        $this->assertEquals($positionRover['Y'], $rover->getPositionY());
    }

    public function testGetPositionEstUnTableau ()
    {

        $positionRover = ['X' => 0, 'Y' => 0];
        $directionRover = 'N';
        $rover = new Rover($positionRover, $directionRover);
        $rover->commandes([]);

        $this->assertInternalType('array', $rover->getPosition());
    }

    public function testGetPositionXRetourneBienLaPositionDuRoverEnX ()
    {
        $positionRover = ['X' => 0, 'Y' => 0];
        $directionRover = 'N';
        $rover = new Rover($positionRover, $directionRover);

        $this->assertEquals($positionRover['X'], $rover->getPositionX());
    }

    public function testChangePositionYChangeBienLaPositionDuRoverEnY ()
    {
        $positionRover = ['X' => 0, 'Y' => 0];
        $directionRover = 'N';
        $nouvellePositionEnY = 2;
        $rover = new Rover($positionRover, $directionRover);

        $this->assertNotEquals($positionRover['Y'], $rover->changePositionY($nouvellePositionEnY));
    }

    public function testChangePositionXChangeBienLaPositionDuRoverEnX ()
    {
        $positionRover = ['X' => 0, 'Y' => 0];
        $directionRover = 'N';
        $nouvellePositionEnX = 2;
        $rover = new Rover($positionRover, $directionRover);

        $this->assertNotEquals($positionRover['X'], $rover->changePositionX($nouvellePositionEnX));
    }

    public function testGetDirectionNestPasVide ()
    {
        $positionRover = ['X' => 0, 'Y' => 0];
        $directionRover = 'N';
        $rover = new Rover($positionRover, $directionRover);
        $roverDirection = $rover->getDirection();

        $this->assertNotEmpty($roverDirection);
    }

    public function testGetDirectionEstUneString ()
    {
        $positionRover = ['X' => 0, 'Y' => 0];
        $directionRover = 'N';
        $rover = new Rover($positionRover, $directionRover);
        $rover->commandes([]);
        $roverDirection = $rover->getDirection();

        $this->assertInternalType('string', $roverDirection);
    }

    public function testGetDirectionSoitNSEO ()
    {
        $positionRover = ['X' => 1, 'Y' => 3];
        $directionRover = 'N';
        $rover = new Rover($positionRover, $directionRover);
        $roverDirection = $rover->getDirection();

        $this->assertEquals($directionRover, $roverDirection);
    }

    public function testPositionYRoverMiseAJourSiCommandeFEtVaVersNord ()
    {
        $positionRover = ['X' => 0, 'Y' => 0];
        $directionRover = 'N';
        $rover = new Rover($positionRover, $directionRover);
        $rover->commandes(['f']);

        $this->assertEquals($rover->getPosition(), ['X' => 0, 'Y' => +1]);
    }

    public function testPositionYRoverMiseAJourSiCommandeBEtVaVersNord ()
    {
        $positionRover = ['X' => 0, 'Y' => 0];
        $directionRover = 'N';
        $rover = new Rover($positionRover, $directionRover);
        $rover->commandes(['b']);

        $this->assertEquals($rover->getPosition(), ['X' => 0, 'Y' => -1]);
    }

    public function testPositionYRoverMiseAJourSiCommandeFEtVaVersSud ()
    {
        $positionRover = ['X' => 0, 'Y' => 0];
        $directionRover = 'S';
        $rover = new Rover($positionRover, $directionRover);
        $rover->commandes(['f']);

        $this->assertEquals($rover->getPosition(), ['X' => 0, 'Y' => -1]);
    }

    public function testPositionYRoverMiseAJourSiCommandeBEtVaVersSud ()
    {
        $positionRover = ['X' => 0, 'Y' => 0];
        $directionRover = 'S';
        $rover = new Rover($positionRover, $directionRover);
        $rover->commandes(['b']);

        $this->assertEquals($rover->getPosition(), ['X' => 0, 'Y' => +1]);
    }

    public function testPositionXRoverMiseAJourSiCommandeFEtVaVersOuest ()
    {
        $positionRover = ['X' => 0, 'Y' => 0];
        $directionRover = 'O';
        $rover = new Rover($positionRover, $directionRover);
        $rover->commandes(['f']);

        $this->assertEquals($rover->getPosition(), ['X' => -1, 'Y' => 0]);
    }

    public function testPositionXRoverMiseAJourSiCommandeBEtVaVersOuest ()
    {
        $positionRover = ['X' => 0, 'Y' => 0];
        $directionRover = 'O';
        $rover = new Rover($positionRover, $directionRover);
        $rover->commandes(['b']);

        $this->assertEquals($rover->getPosition(), ['X' => +1, 'Y' => 0]);
    }

    public function testPositionXRoverMiseAJourSiCommandeFEtVaVersEst ()
    {
        $positionRover = ['X' => 0, 'Y' => 0];
        $directionRover = 'E';
        $rover = new Rover($positionRover, $directionRover);
        $rover->commandes(['f']);

        $this->assertEquals($rover->getPosition(), ['X' => +1, 'Y' => 0]);
    }

    public function testPositionXRoverMiseAJourSiCommandeBEtVaVersEst ()
    {
        $positionRover = ['X' => 0, 'Y' => 0];
        $directionRover = 'E';
        $rover = new Rover($positionRover, $directionRover);
        $rover->commandes(['b']);

        $this->assertEquals($rover->getPosition(), ['X' => -1, 'Y' => 0]);
    }

    public function testPlusieursPosition ()
    {
        $positionRover = ['X' => 0, 'Y' => 0];
        $directionRover = 'N';
        $rover = new Rover($positionRover, $directionRover);
        $rover->commandes(['f', 'f']);

        $this->assertEquals($rover->getPosition(), ['X' => 0, 'Y' => 2]);
    }

    public function testDirectionRoverMiseAJouerSiCommandeLEtVaVersNord ()
    {
        $positionRover = ['X' => 0, 'Y' => 0];
        $directionRover = 'N';
        $rover = new Rover($positionRover, $directionRover);
        $rover->commandes(['l']);

        $this->assertEquals($rover->getDirection(), 'O');
    }

    public function testDirectionRoverMiseAJouerSiCommandeREtVaVersNord ()
    {
        $positionRover = ['X' => 0, 'Y' => 0];
        $directionRover = 'N';
        $rover = new Rover($positionRover, $directionRover);
        $rover->commandes(['r']);

        $this->assertEquals($rover->getDirection(), 'E');
    }

    public function testDirectionRoverMiseAJouerSiCommandeLEtVaVersSud ()
    {
        $positionRover = ['X' => 0, 'Y' => 0];
        $directionRover = 'S';
        $rover = new Rover($positionRover, $directionRover);
        $rover->commandes(['l']);

        $this->assertEquals($rover->getDirection(), 'O');
    }

    public function testDirectionRoverMiseAJouerSiCommandeREtVaVersSud ()
    {
        $positionRover = ['X' => 0, 'Y' => 0];
        $directionRover = 'S';
        $rover = new Rover($positionRover, $directionRover);
        $rover->commandes(['r']);

        $this->assertEquals($rover->getDirection(), 'E');
    }

    public function testDirectionRoverMiseAJouerSiCommandeLEtVaVersOuest ()
    {
        $positionRover = ['X' => 0, 'Y' => 0];
        $directionRover = 'O';
        $rover = new Rover($positionRover, $directionRover);
        $rover->commandes(['l']);

        $this->assertEquals($rover->getDirection(), 'S');
    }

    public function testDirectionRoverMiseAJouerSiCommandeREtVaVersOuest ()
    {
        $positionRover = ['X' => 0, 'Y' => 0];
        $directionRover = 'O';
        $rover = new Rover($positionRover, $directionRover);
        $rover->commandes(['r']);

        $this->assertEquals($rover->getDirection(), 'N');
    }

    public function testDirectionRoverMiseAJouerSiCommandeLEtVaVersEst ()
    {
        $positionRover = ['X' => 0, 'Y' => 0];
        $directionRover = 'E';
        $rover = new Rover($positionRover, $directionRover);
        $rover->commandes(['l']);

        $this->assertEquals($rover->getDirection(), 'N');
    }

    public function testDirectionRoverMiseAJouerSiCommandeREtVaVersEst ()
    {
        $positionRover = ['X' => 0, 'Y' => 0];
        $directionRover = 'E';
        $rover = new Rover($positionRover, $directionRover);
        $rover->commandes(['r']);

        $this->assertEquals($rover->getDirection(), 'S');
    }

    public function testPlusieurChangementDeDirection () {
        $positionRover = ['X' => 0, 'Y' => 0];
        $directionRover = 'N';
        $rover = new Rover($positionRover, $directionRover);
        $rover->commandes(['r', 'r', 'l']);

        $this->assertEquals($rover->getDirection(), 'O');
    }

    public function testGetPositionAlienRetourneBienLaPositionDeLAlien () {
        $positionAlien = ['X' => 7, 'Y' => 2];
        $alien = new Alien($positionAlien);

        $this->assertEquals($positionAlien, $alien->getPositionAlien());
    }

    public function testGetGrilleEstBienUnTableau () {
        $longueur = range(10, 1);
        $largeur = range(1, 10);

        $positionRover = ['X' => 5, 'Y' => 5];
        $directionRover = 'N';
        $rover = new Rover($positionRover, $directionRover);

        $positionAlien = ['X' => 7, 'Y' => 2];
        $alien = new Alien($positionAlien);

        $positionObstacle = ['X' => 3, 'Y' => 6];
        $obstacle = new Obstacle($positionObstacle);

        $map = new Map($longueur, $largeur, $rover, $alien, $obstacle);

        $this->assertInternalType('array', $map->getGrille());
    }

    public function testValidatePositionChangeBienLaPositionDuRoverSiPositionYInferieurA1 () {
        $longueur = range(10, 1);
        $largeur = range(1, 10);

        $positionRover = ['X' => 5, 'Y' => 0];
        $directionRover = 'N';
        $rover = new Rover($positionRover, $directionRover);

        $positionAlien = ['X' => 7, 'Y' => 2];
        $alien = new Alien($positionAlien);

        $positionObstacle = ['X' => 3, 'Y' => 6];
        $obstacle = new Obstacle($positionObstacle);

        $map = new Map($longueur, $largeur, $rover, $alien, $obstacle);

        $map->validatePosition($positionRover['Y'], $positionRover['X']);
        $this->assertEquals($positionRover['Y'], 0);
    }

    public function testValidatePositionChangeBienLaPositionDuRoverSiPositionYSuperieurA10 () {
        $longueur = range(10, 1);
        $largeur = range(1, 10);

        $positionRover = ['X' => 5, 'Y' => 11];
        $directionRover = 'N';
        $rover = new Rover($positionRover, $directionRover);

        $positionAlien = ['X' => 7, 'Y' => 2];
        $alien = new Alien($positionAlien);

        $positionObstacle = ['X' => 3, 'Y' => 6];
        $obstacle = new Obstacle($positionObstacle);

        $map = new Map($longueur, $largeur, $rover, $alien, $obstacle);

        $map->validatePosition($positionRover['Y'], $positionRover['X']);
        $this->assertEquals($positionRover['Y'], 11);
    }

    public function testValidatePositionChangeBienLaPositionDuRoverSiPositionXInferieurA1 () {
        $longueur = range(10, 1);
        $largeur = range(1, 10);

        $positionRover = ['X' => 0, 'Y' => 5];
        $directionRover = 'N';
        $rover = new Rover($positionRover, $directionRover);

        $positionAlien = ['X' => 7, 'Y' => 2];
        $alien = new Alien($positionAlien);

        $positionObstacle = ['X' => 3, 'Y' => 6];
        $obstacle = new Obstacle($positionObstacle);

        $map = new Map($longueur, $largeur, $rover, $alien, $obstacle);

        $map->validatePosition($positionRover['Y'], $positionRover['X']);
        $this->assertEquals($positionRover['X'], 0);
    }

    public function testValidatePositionChangeBienLaPositionDuRoverSiPositionXSuperieurA10 () {
        $longueur = range(10, 1);
        $largeur = range(1, 10);

        $positionRover = ['X' => 11, 'Y' => 5];
        $directionRover = 'N';
        $rover = new Rover($positionRover, $directionRover);

        $positionAlien = ['X' => 7, 'Y' => 2];
        $alien = new Alien($positionAlien);

        $positionObstacle = ['X' => 3, 'Y' => 6];
        $obstacle = new Obstacle($positionObstacle);

        $map = new Map($longueur, $largeur, $rover, $alien, $obstacle);

        $map->validatePosition($positionRover['Y'], $positionRover['X']);
        $this->assertEquals($positionRover['X'], 11);
    }

    public function testGetPositionObstacleRetourneBienLaPositionDeLObstacle () {
        $positionObstacle = ['X' => rand(1, 9), 'Y' => rand(1, 9)];
        $obstacle = new Obstacle($positionObstacle);

        $this->assertEquals($positionObstacle, $obstacle->getPositionObstacle());
    }

}