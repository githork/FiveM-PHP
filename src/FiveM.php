<?php

namespace FiveM;

class FiveM
{

    private $server_address;

    private $server_port;

    /**
     * FiveM constructor.
     * @param null $server_address
     * @param null $server_port
     */
    public function __construct($server_address = null, $server_port = null)
    {
        $this->server_address = $server_address;
        $this->server_port = $server_port;
    }

    /**
     * @param array|null $array
     * @return FiveM
     */
    public function target(array $array = null)
    {
        return !empty($array[0]) && !empty($array[1]) ? new self($array[0], $array[1]) : new self($this->server_address, $this->server_port);
    }

    /**
     * @return ServersList
     */
    public function fromServersList()
    {
        return new ServersList($this->server_address, $this->server_port);
    }

    /**
     * @return int
     */
    public function fromDirectConnect()
    {
        return 404;
    }

    /**
     * @return mixed
     */
    public function getServerAddress()
    {
        return $this->server_address;
    }

    /**
     * @param mixed $server_address
     */
    public function setServerAddress($server_address)
    {
        $this->_server_address = $server_address;
    }
}