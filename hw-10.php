<?php

interface Database
{
    public function getData();
}

class Mysql implements Database
{
    public function getData()
    {
        return 'some data from database';
    }
}

class Controller
{
    private Database $adapter;

    public function __construct(Database $adapter)
    {
        $this->adapter = $adapter;
    }

    function getData()
    {
        return $this->adapter->getData();
    }
}

$mysql = new Mysql();
$controller = new Controller($mysql);

