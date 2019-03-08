<?php

namespace FiveM;

use HttpClient;

class DirectConnect implements RequestInterface
{

    const HTTP_HEADER = "Content-Type: application/json";

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


    /**
     * @return false|mixed|string
     */
    public function status()
    {
        header(self::HTTP_HEADER);
        return json_encode([
            'status_code' => (new HttpClient())->get($this->_serverAddress . ":" . $this->_serverPort . self::INFO)->getStatusCode()
        ]);
    }


    /**
     * @return false|mixed|string
     */
    public function get()
    {
        $infoRequest = (new HttpClient())->get($this->_serverAddress . ":" . $this->_serverPort . self::INFO)->getBody()->getContents();
        $playersRequest = (new HttpClient())->get($this->_serverAddress . ":" . $this->_serverPort . self::PLAYERS)->getBody()->getContents();
        header(self::HTTP_HEADER);
        return json_encode([
            'info' => json_decode($infoRequest),
            'players' => json_decode($playersRequest)
        ]);
    }


    /**
     * @return false|mixed|string
     */
    public function getPlayers()
    {
        $request = self::get();
        header(self::HTTP_HEADER);
        return json_encode(json_decode($request)->players);
    }


    /**
     * @return false|mixed|string
     */
    public function getResources()
    {
        $request = self::get();
        header(self::HTTP_HEADER);
        return json_encode(json_decode($request)->info->resources);
    }


    /**
     * @return false|mixed|string
     */
    public function getInfos()
    {
        $request = self::get();
        header(self::HTTP_HEADER);
        return json_encode(json_decode($request)->info);
    }


    /**
     * @return \InvalidFeatureException|mixed
     */
    public function getRequest()
    {
        return new \InvalidFeatureException('Invalid feature.');
    }

}