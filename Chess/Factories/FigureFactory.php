<?php
namespace Chess\Factories;

use Chess\Figures\Bishop;
use Chess\Figures\King;
use Chess\Figures\Knight;
use Chess\Figures\Pawn;
use Chess\Figures\Queen;
use Chess\Figures\Rook;

class FigureFactory
{
    public function createBishop($color)
    {
        return new Bishop($color);
    }

    public function createKing($color)
    {
        return new King($color);
    }

    public function createKnight($color)
    {
        return new Knight($color);
    }

    public function createPawn($color)
    {
        return new Pawn($color);
    }

    public function createQueen($color)
    {
        return new Queen($color);
    }

    public function createRook($color)
    {
        return new Rook($color);
    }
}
