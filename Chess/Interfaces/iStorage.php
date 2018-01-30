<?php
namespace Chess\Interfaces;

interface iStorage
{
    public function save($board);
    public function load();
}
