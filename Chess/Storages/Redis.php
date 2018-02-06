<?php
namespace Chess\Storages;

use Chess\Interfaces\iStorage;

class Redis implements iStorage
{
    private $client;
    private $key;

    public function __construct($key, $client)
    {
        $this->key = $key;
        $this->client = $client;
    }

    public function save($board)
    {
        $this->client->set($this->key, serialize($board));
    }

    public function load()
    {
        $value = $this->client->get($this->key);
        return unserialize($value);
    }
}
