<?php
namespace Vendor\Package\Utils;


use GuzzleHttp\Client;
use Vendor\Package\Interfaces\HttpRequest;

/**
 * Class HttpClient
 * @package Vendor\Package\Utils
 */
abstract class HttpClient implements HttpRequest
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
     * @param bool $verify Verify SSL or not in request
     * @param string|null $authorization Sets the value of the Headers Authorization parameter.
     * @return Client Returns the client object GuzzleHttp
     */
    public function client(string $hostname = null, bool $verify = true, string $authorization = null): Client
    {
        if (!empty($hostname))
            $settings = ['base_uri' => $hostname];
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

        return $this->instance;
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
        return $this->instance->put($url,['json' => $content])->getBody()->getContents();
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
