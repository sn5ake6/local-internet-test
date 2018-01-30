<?php
namespace Chess\Storages;

use Chess\Interfaces\iStorage;

class File implements iStorage
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function save($board)
    {
        file_put_contents($this->name, serialize($board));
    }

    public function load()
    {
        $string = file_get_contents($this->name);
        return unserialize($string);
    }
}
