<?php

class Obstacle
{
    private $position;

    public function __construct($position)
    {
        $this->position = $position;
    }

    public function getPositionObstacle()
    {
        return $this->position;
    }

}