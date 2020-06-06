<?php

namespace FiveM\Interfaces;

use GuzzleHttp\Client;

/**
 * Interface HttpRequest
 *
 * Interface to perform requests mainly for payment modules
 *
 * @package App\Infrastructure\Wrappers\Internal\Payement\Interfaces
 */
interface HttpRequest
{
    /**
     * Create a GuzzleHttp client object
     *
     * @param string $hostname Base URL of a sample request : (https://play.riveria.fr)
     * @param int $port Base FXServer port : (30120)
     * @param bool $verify Verify SSL or not in request
     * @param string|null $authorization Sets the value of the Headers Authorization parameter.
     */
    public function __construct(string $hostname = null, int $port = 30120, bool $verify = true, string $authorization = null);

    /**
     * Retrieves the configured GuzzleHttp instance
     *
     * @return Client Returns the client object GuzzleHttp
     */
    public function getInstance(): Client;

    /**
     * Allows to perform a GET requst to a link
     *
     * @param string $url Link of the request to be made
     * @return string Return a result of reponse GuzzleHttp
     */
    public function get(string $url): string;

    /**
     * Allows to perform a POST requst to a link
     *
     * @param string $url Link of the request to be made
     * @param array $content Content to be sent during the request
     * @return string Return a result of reponse GuzzleHttp
     */
    public function post(string $url, array $content = []): string;

    /**
     * Allows to perform a PUT requst to a link
     *
     * @param string $url Link of the request to be made
     * @param array $content Content to be sent during the request
     * @return string Return a result of reponse GuzzleHttp
     */
    public function put(string $url, array $content = []): string;

    /**
     * Permet d'effectuer une requst DELETE vers un lien
     *
     * @param string $url Link of the request to be made
     * @return string Return a result of reponse GuzzleHttp
     */
    public function delete(string $url): string;
}
