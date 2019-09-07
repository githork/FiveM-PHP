<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class HttpClient
{

    const OPTIONS = [
        'timeout' => 6.0,
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => "application/json",
        ],
    ];

    /**
     * HttpClient constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param string $path
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function get(string $path)
    {
        $client = new Client(self::OPTIONS);
        try {
            return $client->request('GET', $path);
        } catch (GuzzleException $e) {
            throw new Exception;
        }
    }


}
