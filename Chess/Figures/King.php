<?php
namespace Chess\Figures;

class King extends Figure
{
    public function canMove($from_position, $to_position)
    {
        //own move logic
        return true;
    }
}
