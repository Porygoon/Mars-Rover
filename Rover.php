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
                $this->position['Y'] = $this->position['Y'] + 1;
            } else if ($commandes[$i] == 'b' && $roverDirection == 'N') {
                $this->position['Y'] = $this->position['Y'] - 1;
            } else if ($commandes[$i] == 'f' && $roverDirection == 'S') {
                $this->position['Y'] = $this->position['Y'] - 1;
            } else if ($commandes[$i] == 'b' && $roverDirection == 'S') {
                $this->position['Y'] = $this->position['Y'] + 1;
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

}

$positionRover = ['X' => 0, 'Y' => 0];
$directionRover = 'N';
$rover = new Rover($positionRover, $directionRover);

$rover->commandes(['f']);
$rover->commandes(['f']);

print_r($rover->getPosition());

