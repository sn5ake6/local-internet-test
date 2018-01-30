<?php
namespace Chess;

use Chess\Interfaces\iPosition;

class Position implements iPosition
{
    private $row;
    private $column;

    public function __construct($row, $column)
    {
        $this->set($row, $column);
    }

    public function getRow()
    {
        return $this->row;
    }

    public function getColumn()
    {
        return $this->column;
    }

    public function equals(iPosition $position)
    {
        return $this->getRow() == $position->getRow()
            && $this->getColumn() == $position->getColumn();
    }

    public function set($row, $column)
    {
        $this->row = $row;
        $this->column = $column;
    }

    public function __toString()
    {
        return $this->getRow() . ", " . $this->getColumn();
    }
}
