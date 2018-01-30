<?php
namespace Chess\Figures;

use Chess\Interfaces\iFigure;

abstract class Figure implements iFigure
{
    private $color;
    private $name;

    public function __construct($color)
    {
        $this->color = $color;
        $this->name = str_replace('\\', DIRECTORY_SEPARATOR, get_class($this));
        $this->name = basename($this->name);
    }

    public function __toString()
    {
        return $this->getName();
    }

    public function getColor()
    {
        return $this->color;
    }

    public function getName()
    {
        return strtolower($this->name);
    }

    public function canMove($from_position, $to_position)
    {
    }
}
