<?php


namespace Sms;


class SmsSentEvent
{
    protected $sms, $response;

    public function __construct(Sms $sms, $response)
    {
        $this->sms = $sms;
        $this->response = $response;
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @return Sms
     */
    public function getSms(): Sms
    {
        return $this->sms;
    }
}
