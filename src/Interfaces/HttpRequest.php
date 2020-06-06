<?php
namespace Vendor\Package\Interfaces;

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
     * @param bool $verify Verify SSL or not in request
     * @param string|null $authorization Sets the value of the Headers Authorization parameter.
     * @return Client Returns the client object GuzzleHttp
     */
    public function client(string $hostname = null, bool $verify = true, string $authorization = null): Client;

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
     * Allows to make a DELETE request to a link
     *
     * @param string $url Link of the request to be made
     * @return string Return a result of reponse GuzzleHttp
     */
    public function delete(string $url): string;
}
