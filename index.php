<?php
require_once 'autoload.php';

use Chess\Board;
use Chess\BoardItem;
use Chess\Position;
use Chess\Factories\FigureFactory;
use Chess\Storages\File;

$size = 8;
$board = new Board($size, $size) ;
$factory = new FigureFactory();
$board->addItem(
    new BoardItem(new Position(1, 1), $factory->createPawn('white'))
);

$storage = new File('storage.dat');
$storage->save($board);
$board->deleteItem(new Position(1, 1));

$other_board = $storage->load();
$other_board->moveItem(new Position(1, 1), new Position(5, 3));
