<?php

namespace FiveM;

class DirectConnect implements RequestInterface
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

    public function status()
    {
        // TODO: Implement status() method.
        return 0;
    }

    public function get()
    {
        // TODO: Implement get() method.
        return 0;
    }

    /**
     * @return mixed
     */
    public function getPlayers()
    {
        // TODO: Implement getPlayers() method.
    }

    /**
     * @return mixed
     */
    public function getResources()
    {
        // TODO: Implement getResources() method.
    }

    /**
     * @return mixed
     */
    public function getInfos()
    {
        // TODO: Implement getInfos() method.
    }

    /**
     * @return mixed
     */
    public function getRequest()
    {
        // TODO: Implement getRequest() method.
    }
}