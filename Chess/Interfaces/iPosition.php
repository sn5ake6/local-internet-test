<?php
namespace Chess\Interfaces;

interface iPosition
{
    public function getRow();
    public function getColumn();
    public function equals(iPosition $position);
    public function set($row, $column);
}
