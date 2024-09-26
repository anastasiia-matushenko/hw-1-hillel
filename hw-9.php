<?php

interface LogFormat
{
    public function format($string);
}

interface LogDelivery
{
    public function deliver($format);
}

class RawFormat implements LogFormat
{
    public function format($string){
        return $string;
    }
}

class WithDateFormat implements LogFormat
{
    public function format($string){
        return date('Y-m-d H:i:s') . $string;
    }
}

class WithDateAndDetailsFormat implements LogFormat
{
    public function format($string){
        return date('Y-m-d H:i:s') . $string . ' - With some details';
    }
}

class EmailDelivery implements LogDelivery
{
    public function deliver($format)
    {
        echo "Вывод формата ({$format}) сдпо имейл";
    }
}

class SmsDelivery implements LogDelivery
{
    public function deliver($format)
    {
        echo "Вывод формата ({$format}) в смс";
    }
}

class ConsoleDelivery implements LogDelivery
{
    public function deliver($format)
    {
        echo "Вывод формата ({$format}) в консоль";
    }
}

class Logger
{
    private LogFormat $format;
    private LogDelivery $delivery;

    public function __construct(LogFormat $format, LogDelivery $delivery)
    {
        $this->format = $format;
        $this->delivery = $delivery;
    }

    public function log($string)
    {
        $formattedMessage = $this->format->format($string);
        $this->delivery->deliver($formattedMessage);
    }
}

$logger = new Logger(new RawFormat(), new SmsDelivery());
$logger->log('Emergency error! Please fix me!');
