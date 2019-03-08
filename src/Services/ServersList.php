<?php

namespace FiveM;

use HttpClient;
use Tightenco\Collect\Support\Collection;

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
    public function __construct(string $server_address, int $server_port)
    {
        $this->server_address = $server_address;
        $this->server_port = $server_port;
    }


    /**
     * @return bool|false|mixed|string
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


    /**
     * @return false|string
     */
    public function status()
    {
        header(self::HTTP_HEADER);
        return json_encode([
            'status_code' => (new HttpClient())->get(self::SERVERS_LIST)->getStatusCode()
        ]);
    }

    /**
     * @return false|string
     */
    public function getResources()
    {
        return json_encode(json_decode(self::get())->resources);
    }


    /**
     * @return Collection|mixed|\Tightenco\Collect\Support\Collection
     */
    public function getInfos()
    {
        $array = json_decode(self::get());
        $collect = collect([]);
        foreach ($array as $row => $value) {
            foreach ($array->vars as $rowVars => $valueVars) {
                $collect->push([
                    $rowVars => $valueVars
                ]);
            }
            if ($row != "players" && $row != 'resources' && $row != "vars")
                $collect->push([
                    $row => $value
                ]);
        }
        $collect->push(['resources' => count($array->resources)]);
        return $collect->collapse();

    }

    /**
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function getRequest()
    {
        return (new HttpClient())->get(self::SERVERS_LIST);
    }

    /**
     * @return mixed
     */
    public function getPlayers()
    {
        return json_encode(json_decode(self::get())->players);
    }


    /**
     * @param array $array
     * @return array|bool|\Illuminate\Support\Collection|Collection
     */
    public function findPlayer(array $array)
    {
        if (!empty($array) && !empty($array[0]) && !empty($array[1])) {
            if ($array[0] == "steam" || $array[0] == "discord" || $array[0] == "xb1" || $array[0] == "live" || $array[0] == "license") {
                $collect = collect([]);
                $array_value = json_decode((new HttpClient())->get(self::SERVERS_LIST)->getBody());
                for ($i = 0; $i < count($array_value); ++$i) {
                    for ($x = 0; $x < count($array_value[$i]->Data->players); ++$x) {
                        for ($z = 0; $z < count($array_value[$i]->Data->players[$x]->identifiers); ++$z) {
                            if ($array_value[$i]->Data->players[$x]->identifiers[$z] == $array[0] . ':' . $array[1]) {
                                $collect->push($array_value[$i]->Data);
                            }
                        }
                    }
                }
                header(self::HTTP_HEADER);
                return $collect;
            } else {
                return [
                    'valid-search-parameter' => [
                        'steam',
                        'discord',
                        'xb1',
                        'live',
                        'license',
                    ]
                ];
            }
        } else {
            return false;
        }
    }

}