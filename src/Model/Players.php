<?php

/**
 * Players online lists model
 *
 * Class Players
 */
class Players
{
    /**
     * @var string Player source ID (Network ID)
     */
    public $network_id;

    /***
     * @var string Player IPv4 Endpoint
     */
    public $endpoint;

    /**
     * @var string Player username (Steam or Another Identifiers)
     */
    public $name;

    /**
     * @var Identifiers Identifiers lists
     */
    public $identifiers;

    /**
     * @var int Player ping
     */
    public $ping;
}
