<?php


namespace Mails;


use Sms\Sms;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;

class TestMailFromSms extends Mailable
{

    use Queueable;

    public function __construct(Sms $sms)
    {
        $this->to(config('app.sms_test_address'));
        $this->view('communicate.test_mail', [
            'number' => $sms->getRecipient(),
            'sender' => $sms->getSenderName(),
            'content' => $sms->getContent()
        ]);
        $this->subject('SMS trap - ' . $sms->getRecipient());
    }

    public function build()
    {
        return $this;
    }
}
