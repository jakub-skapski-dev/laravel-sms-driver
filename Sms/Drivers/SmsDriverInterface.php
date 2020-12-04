<?php


namespace Sms\Drivers;


use Sms\Sms;

interface SmsDriverInterface
{
    public function send(Sms $sms);
}
