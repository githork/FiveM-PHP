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
        if (!empty($array[0]) && !empty($array[1])) {
            return new self($array[0], $array[1]);
        } elseif (!empty($this->server_address) && !empty($this->server_port)) {
            return new self($this->server_address, $this->server_port);
        } else {
            return new self("127.0.0.1", 30120);
        }
    }

    /**
     * @return ServersList
     */
    public function fromServersList()
    {
        return new ServersList($this->server_address, $this->server_port);
    }


    /**
     * @return DirectConnect
     */
    public function fromDirectConnect()
    {
        return new DirectConnect($this->server_address, $this->server_port);
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