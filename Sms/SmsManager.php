<?php


namespace Sms;


use Sms\Drivers\PromoSmsSender;
use Sms\Drivers\TestSmsSender;
use Illuminate\Support\Manager;

class SmsManager extends Manager
{
    public function createPromosmsDriver()
    {
        return new PromoSmsSender();
    }

    public function createTestDriver()
    {
        return new TestSmsSender();
    }

    public function getDefaultDriver()
    {
        return config('app.sms_driver');
    }
}
