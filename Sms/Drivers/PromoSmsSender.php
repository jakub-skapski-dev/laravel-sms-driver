<?php


namespace Sms\Drivers;


use Sms\Sms;
use Webservices\PromoSms;

class PromoSmsSender implements SmsDriverInterface
{
    protected $api;

    public function __construct()
    {
        $this->api = new PromoSms(config('services.promosms.login'), config('services.promosms.password'));
    }

    public function send(Sms $sms)
    {
        return $this->api->sendMaxSms($sms->getContent(), [$sms->getRecipient()], $sms->getSenderName());
    }
}
