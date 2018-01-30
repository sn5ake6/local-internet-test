<?php
namespace Chess;

use Chess\Interfaces\iBoardItem;
use Chess\Interfaces\iPosition;
use Chess\Interfaces\iFigure;

class BoardItem implements iBoardItem
{
    private $position;
    private $figure;

    public function __construct(iPosition $position, iFigure $figure)
    {
        $this->position = $position;
        $this->figure = $figure;
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function getFigure()
    {
        return $this->figure;
    }

    public function move(iPosition $position)
    {
        if ($this->figure->canMove($this->position, $position)) {
            $this->position = $position;
        }
    }
}
