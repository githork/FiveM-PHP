<?php

namespace FiveM;

class DirectConnect
{

    const PLAYERS = "/players.json";

    const INFO = "/info.json";

    private $_serverPort;

    private $_serverAddress;


    /**
     * DirectConnect constructor.
     * @param $serverAddress
     * @param $serverPort
     */
    public function __construct($serverAddress, $serverPort)
    {
        $this->_serverAddress = $serverAddress;
        $this->_serverPort = $serverPort;
    }

}