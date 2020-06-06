<?php

namespace FiveM\Utils;


use FiveM\Interfaces\HttpRequest;
use GuzzleHttp\Client;


/**
 * Class HttpClient
 * @package Vendor\Package\Utils
 */
class HttpClient implements HttpRequest
{

    /**
     * @var Client GuzzleHttp client instance
     */
    private $instance;

    /**
     * @var string
     */
    private $uri;

    /**
     * @var string TODO Unused next feature soon
     */
    public $apikey;

    /**
     * Create a GuzzleHttp client object
     *
     * @param string $hostname Base URL of a sample request : (https://play.riveria.fr)
     * @param int $port Base FXServer port : (30120)
     * @param bool $verify Verify SSL or not in request
     * @param string|null $authorization Sets the value of the Headers Authorization parameter.
     */
    public function __construct(string $hostname = null, int $port = 30120, bool $verify = true, string $authorization = null)
    {
        if (!empty($hostname))
            $settings = ['base_uri' => sprintf("http://%s:%s/", $hostname, $port)];
        else
            $settings = ['base_uri' => $this->uri];
        if (!empty($authorization))
            $optional = ['Authorization' => $authorization];
        else
            $optional = [];

        /** @var array $optional */
        $this->instance = new Client(array_merge($settings, [
            'verify' => $verify or false,
            'timeout' => 5.0,
            'connected_timeout' => 3.0,
            'headers' => array_merge($optional, [
                'Content-Type' => 'application/json',
            ])
        ]));
    }

    /**
     * Retrieves the configured GuzzleHttp instance
     *
     * @return Client Returns the client object GuzzleHttp
     */
    public function getInstance(): Client
    {
        return $this->instance;
    }

    /**
     * Allows to perform a GET requst to a link
     *
     * @param string $url Link of the request to be made
     * @return string Return a result of reponse GuzzleHttp
     */
    public function get(string $url): string
    {
        return $this->instance->get($url)->getBody()->getContents();
    }

    /**
     * Allows to perform a POST requst to a link
     *
     * @param string $url Link of the request to be made
     * @param array $content Content to be sent during the request
     * @return string Return a result of reponse GuzzleHttp
     */
    public function post(string $url, array $content = []): string
    {
        return $this->instance->post($url, ['json' => $content])->getBody()->getContents();
    }

    /**
     * Allows to perform a PUT requst to a link
     *
     * @param string $url Link of the request to be made
     * @param array $content Content to be sent during the request
     * @return string Return a result of reponse GuzzleHttp
     */
    public function put(string $url, array $content = []): string
    {
        return $this->instance->put($url, ['json' => $content])->getBody()->getContents();
    }

    /**
     * Allows to make a DELETE request to a link
     *
     * @param string $url Link of the request to be made
     * @return string Return a result of reponse GuzzleHttp
     */
    public function delete(string $url): string
    {
        return $this->instance->delete($url)->getBody()->getContents();
    }
}
