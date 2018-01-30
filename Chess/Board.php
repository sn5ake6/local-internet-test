<?php
namespace Chess;

use Chess\Interfaces\iBoardItem;
use Chess\Interfaces\iPosition;
use Chess\Exceptions\EmptyItemException;

class Board
{
    private $items = [];
    private $rows;
    private $columns;

    public function __construct($rows, $columns)
    {
        $this->rows = $rows;
        $this->columns = $columns;
    }

    private function getIndex(iPosition $position)
    {
        foreach ($this->items as $index => $item) {
            if ($position->equals($item->getPosition())) {
                return $index;
            }
        }
        throw new EmptyItemException();
    }

    public function getItem(iPosition $position)
    {
        $index = $this->getIndex($position);
        return $this->items[$index];
    }

    private function showMessage($message)
    {
        echo $message . PHP_EOL;
    }


    public function addItem(iBoardItem $item)
    {
        try {
            $position = $item->getPosition();
            $exist_item = $this->getItem($position);
            $this->showMessage("Can't add! Position [$position] is not empty!");
        } catch (EmptyItemException $e) {
            $this->items[] = $item;
        }
    }

    public function moveItem(iPosition $from_position, iPosition $to_position)
    {
        try {
            $item = $this->getItem($from_position);
        } catch (EmptyItemException $e) {
            $this->showMessage("Can't move! Position [$from_position] is empty!");
            return;
        }
        try {
            $to_item = $this->getItem($to_position);
            $this->showMessage("Can't move! Target position [$to_position] is not empty!");
        } catch (EmptyItemException $e) {
            $item->move($to_position);
        }
    }

    public function deleteItem(iPosition $position)
    {
        try {
            $index = $this->getIndex($position);
            unset($this->items[$index]);
        } catch (EmptyItemException $e) {
            $this->showMessage("Can't delete! Position [$position] is empty!");
        }
    }
}
