<?php
namespace Chess\Interfaces;

interface iFigure
{
    public function getColor();
    public function getName();
    public function canMove($from_position, $to_position);
}
