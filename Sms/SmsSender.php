<?php


namespace Sms;


use Sms\Drivers\SmsDriverInterface;

class SmsSender
{

    protected $driver;

    public function __construct(SmsDriverInterface $driver)
    {
        $this->driver = $driver;
    }

    public function send(Sms $sms)
    {
        $response = $this->driver->send($sms);

        event(new SmsSentEvent($sms, $response));

        return $response;
    }
}
