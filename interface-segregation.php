<?php

interface Bird
{
    public function eat();
}

interface FlyableBird extends Bird
{
    public function fly();
}

class Swallow implements FlyableBird
{
    public function eat() {  }
    public function fly() {  }
}

class Ostrich implements Bird
{
    public function eat() { }
}


