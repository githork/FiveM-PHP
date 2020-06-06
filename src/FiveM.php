<?php

namespace Vendor\Package;


use Vendor\Package\Interfaces\Methods;
use Vendor\Package\Utils\HttpClient;

class FiveM extends HttpClient implements Methods
{

    /**
     * Http response header
     */
    const HTTP_HEADER = "Content-Type: application/json";

    /**
     * Players list endpoint
     */
    const PLAYERS = "/players.json";

    /**
     * Server Info endpoint
     */
    const INFO = "/info.json";


    /**
     * Get players lists and infos
     *
     * @return array
     */
    public function all(): array
    {
        // TODO: Implement get() method.
    }

    /**
     * Get players lists
     *
     * @return array
     */
    public function players(): array
    {
        // TODO: Implement players() method.
    }

    /**
     * Get resources lists
     *
     * @return array
     */
    public function resources(): array
    {
        // TODO: Implement resources() method.
    }

    /**
     * Get server vars info
     *
     * @return array
     */
    public function vars(): array
    {
        // TODO: Implement vars() method.
    }
}
