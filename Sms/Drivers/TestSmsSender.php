<?php


namespace Sms\Drivers;


use Mails\TestMailFromSms;
use Sms\Sms;
use Illuminate\Support\Facades\Mail;

class TestSmsSender implements SmsDriverInterface
{

    public function __construct()
    {
        if(!app('swift.transport')->driver() instanceof \Swift_SmtpTransport)
            throw new \Exception('Mail driver must be set to SMTP');

        if(strpos(config('mail.host'), 'mailtrap') === false)
            throw new \Exception('SMTP host must be an mailtrap');
    }

    public function send(Sms $sms)
    {
        Mail::send(new TestMailFromSms($sms));
    }
}
