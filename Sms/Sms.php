<?php


namespace Sms;


class Sms
{
    protected $content, $senderName, $recipient;

    public function __construct($content, $senderName, $recipient)
    {
        $this->content = $content;
        $this->senderName = $senderName;
        $this->recipient = $recipient;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return mixed
     */
    public function getRecipient()
    {
        return $this->recipient;
    }

    /**
     * @return mixed
     */
    public function getSenderName()
    {
        return $this->senderName;
    }
}
