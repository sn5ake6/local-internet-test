<?php
namespace Chess\Figures;

class Knight extends Figure
{
    public function canMove($from_position, $to_position)
    {
        //own move logic
        return true;
    }
}
