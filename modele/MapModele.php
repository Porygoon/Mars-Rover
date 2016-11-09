<?php
require_once 'RoverModele.php';
require_once 'ObstacleModele.php';

class Map
{
    private $longueur;
    private $largeur;
    private $rover;
    private $alien;
    private $obstacle;

    public function __construct($longueurMap, $largeurMap, Rover $Rover, Alien $Alien, Obstacle $Obstacle)
    {
        $this->longueur = $longueurMap;
        $this->largeur = $largeurMap;
        $this->rover = $Rover;
        $this->alien = $Alien;
        $this->obstacle = $Obstacle;
    }

    public function commandRover($commandes)
    {
        $this->rover->commandes($commandes);
        $isRoverValid = $this->validatePosition($this->rover->getPosition());
    }

    public function getGrille()
    {

        $positionRover = $this->rover->getPosition();
        $positionAlien = $this->alien->getPositionAlien();
        $positionObstacle = $this->obstacle->getPositionObstacle();

        foreach ($this->longueur as $ligneIndex) {
            $grille[$ligneIndex] = $this->largeur;
        }

        $grille[$positionRover['Y']][$positionRover['X']] = $this->rover;
        $grille[$positionObstacle['Y']][$positionObstacle['X']] = $this->obstacle;
        $grille[$positionAlien['Y']][$positionAlien['X']] = $this->alien;

        return $grille;
    }

    private function validatePosition($position)
    {
        $position = $this->rover->getPosition();

        if($position <  1) {
            $this->rover->changePositionY(10);
        }

        if($position >  10) {
            $this->rover->changePositionY(1);
        }

        if($position <  0) {
            $this->rover->changePositionX(9);
        }

        if($position >  9) {
            $this->rover->changePositionX(0);
        }
    }

}
