<?php
use PHPUnit\Framework\TestCase;

require_once 'Rover.php';

class RoverTest extends TestCase
{

    public function testNeBougePasDeSaPosisionInitialeQuandAucuneCommande()
    {
        $positionRover = ['X' => 0, 'Y' => 0];
        $directionRover = 'N';
        $rover = new Rover($positionRover, $directionRover);
        $rover->commandes([]);

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

    public function testGetPositionEstUnTableau ()
    {

        $positionRover = ['X' => 0, 'Y' => 0];
        $directionRover = 'N';
        $rover = new Rover($positionRover, $directionRover);
        $rover->commandes([]);

        $this->assertInternalType('array', $rover->getPosition());
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

}