<?php
use PHPUnit\Framework\TestCase;
use Chess\Board;
use Chess\BoardItem;
use Chess\Position;
use Chess\Figures\Pawn;
use Chess\ExceptionS\EmptyItemException;

final class BoardTest extends TestCase
{
    protected $board;
    protected $board_item;
    protected $position;
    protected $figure;

    protected function setUp()
    {
        $this->board = new Board(8, 8);
        $this->position = new Position(1, 1);
        $this->figure = new Pawn('black');
        $this->board_item = new BoardItem($this->position, $this->figure);
        $this->board->addItem($this->board_item);
    }

    protected function tearDown()
    {
        unset($this->position);
        unset($this->board);
    }

    public function testCreateBoard()
    {
        $this->assertInstanceOf(Board::class, $this->board);
    }

    public function testCreateBoardItem()
    {
        $this->assertInstanceOf(BoardItem::class, $this->board_item);
    }

    public function testCreatePosition()
    {
        $this->assertInstanceOf(Position::class, $this->position);
    }

    public function testAddItem()
    {
        $actual = $this->board->getItem($this->position);
        $this->assertSame($this->board_item, $actual);
    }

    public function testMoveItem()
    {
        $new_position = new Position(2, 2);
        $this->board->moveItem($this->position, $new_position);
        $actual = $this->board->getItem($new_position);
        $this->assertSame($this->board_item, $actual);
    }

    public function testDeleteItem()
    {
        $this->board->deleteItem($this->position);
        $this->expectException(EmptyItemException::class);
        $actual = $this->board->getItem($this->position);
    }
}
