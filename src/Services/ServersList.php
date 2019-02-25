<?php

namespace FiveM;

use HttpClient;

class ServersList implements RequestInterface
{

    const HTTP_HEADER = "Content-Type: application/json";

    const SERVERS_LIST = 'https://servers-live.fivem.net/api/servers/';

    protected $server_address;

    protected $server_port;

    /**
     * ServersList constructor.
     * @param $server_address
     * @param $server_port
     */
    public function __construct($server_address, $server_port)
    {
        $this->server_address = $server_address;
        $this->server_port = $server_port;
    }


    /**
     * @return mixed
     * @throws \Exception
     */
    public function get()
    {
        $collect = collect([]);
        $secondsCollect = collect([]);
        $array_value = json_decode((new HttpClient())->get(self::SERVERS_LIST)->getBody()->getContents());
        for ($i = 0; $i < count($array_value); ++$i) {
            if ($array_value[$i]->EndPoint == $this->server_address . ':' . $this->server_port) {
                $collect->push($array_value[$i]);
            }
            foreach ($collect as $value) {
                $secondsCollect->push($value);
                header(self::HTTP_HEADER);
                return json_encode(json_decode($secondsCollect)[0]->Data);
            }
        }
        return false;
    }


}