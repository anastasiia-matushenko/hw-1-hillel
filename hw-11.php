<?php

interface Taxi
{
    public function getModel(): string;

    public function getPrice(): float;
}

class EconomyTaxi implements Taxi
{

    public function getModel(): string
    {
        return 'Lanos';
    }

    public function getPrice(): float
    {
        return 10.2;
    }
}

class StandardTaxi implements Taxi
{

    public function getModel(): string
    {
        return 'Hyundai';
    }

    public function getPrice(): float
    {
        return 15;
    }
}

class LuxTaxi implements Taxi
{

    public function getModel(): string
    {
        return 'Mercedes';
    }

    public function getPrice(): float
    {
        return 20;
    }
}

abstract class TaxiCreator
{
    abstract public function createTaxi(): Taxi;

    public function getTaxi(): Taxi
    {
        return $this->createTaxi();
    }
}

class EconomyTaxiCreator extends TaxiCreator
{
    public function createTaxi(): Taxi
    {
        return new EconomyTaxi();
    }
}

class StandardTaxiCreator extends TaxiCreator
{
    public function createTaxi(): Taxi
    {
        return new StandardTaxi();
    }
}

class LuxTaxiCreator extends TaxiCreator
{
    public function createTaxi(): Taxi
    {
        return new LuxTaxi();
    }
}

function clientCode(TaxiCreator $taxiCreator)
{
    $taxi = $taxiCreator->getTaxi();
    echo "Taxi Model: {$taxi->getModel()}\n";
    echo "Taxi Price: {$taxi->getPrice()}\n";
}

clientCode(new EconomyTaxiCreator());
