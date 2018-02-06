<?php
require_once 'autoload.php';
require_once('./vendor/autoload.php');

use Chess\Board;
use Chess\BoardItem;
use Chess\Position;
use Chess\Factories\FigureFactory;
use Chess\Storages\File;
use Chess\Storages\Redis;

$size = 8;
$board = new Board($size, $size) ;
$factory = new FigureFactory();
$start_position = new Position(1, 1);
$board->addItem(
    new BoardItem($start_position, $factory->createPawn('white'))
);

$file_storage = new File('storage.dat');
$file_storage->save($board);

$redis_storage = new Redis('board', new Predis\Client());
$redis_storage->save($board);

$board->deleteItem($start_position);

$another_position = new Position(5, 3);
$board_from_file = $file_storage->load();
$board_from_file->moveItem($start_position, $another_position);

$board_from_redis = $redis_storage->load();
$board_from_redis->moveItem($start_position, $another_position);
