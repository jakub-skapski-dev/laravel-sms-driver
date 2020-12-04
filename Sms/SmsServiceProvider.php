<?php


namespace Sms;


use Illuminate\Support\ServiceProvider;

class SmsServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->registerTransporter();
        $this->registerSender();
    }

    protected function registerTransporter()
    {
        $this->app->singleton('sms.transport', function($app)
        {
            return new SmsManager($app);
        });
    }

    protected function registerSender()
    {
        $this->app->singleton('sms.sender', function($app)
        {
            return new SmsSender($app['sms.transport']->driver());
        });
    }
}
