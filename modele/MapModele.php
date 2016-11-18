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
    
    public function getRover(): Rover
    {
        return $this->rover;
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

    public function validatePosition($positionY, $positionX)
    {

        if($positionY <  1) {
            $this->rover = new Rover(['X' => $positionX, 'Y' => 10], $this->rover->getDirection()
            );
        }

        if($positionY >  10) {
            $this->rover = new Rover(['X' => $positionX, 'Y' => 1], $this->rover->getDirection());
        }

        if($positionX <  0) {
            $this->rover = new Rover(['X' => 9, 'Y' => $positionY], $this->rover->getDirection());
        }

        if($positionX >  9) {
            $this->rover = new Rover(['X' => 0, 'Y' => $positionY], $this->rover->getDirection());
        }
    }

}
