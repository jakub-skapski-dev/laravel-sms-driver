<?php


namespace Webservices;


use GuzzleHttp\Client;

class PromoSms
{
    protected $login, $password, $client;

    public function __construct($login, $password)
    {
        $this->login = $login;
        $this->password = $password;

        $this->client = new Client([
            'base_uri' => 'https://promosms.com/api/rest/v3_2/'
        ]);
    }

    public function sendMaxSms(string $content, array $recipients, string $sender)
    {
        $response = $this->makeRequest('sms', [
            'text' => $content,
            'type' => 3,
            'recipients' => $recipients,
            'sender' => $sender
        ]);

        return $response;
    }

    protected function makeRequest($route, $data)
    {
        $response = $this->client->post($route, [
            'headers' => $this->getHeaders(),
            'form_params' => $data
        ]);

        return json_decode($response->getBody()->getContents())->response;
    }

    protected function getHeaders()
    {
        return [
            'Authorization' => 'Basic ' . base64_encode($this->login . ':' . $this->password)
        ];
    }
}
