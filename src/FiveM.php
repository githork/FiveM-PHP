<?php

namespace FiveM;


use FiveM\Interfaces\Methods;
use FiveM\Utils\HttpClient;
use Players;

/**
 * Class FiveM
 * @package FiveM
 */
class FiveM extends HttpClient implements Methods
{

    /**
     * Players list endpoint
     */
    const PLAYERS = "/players.json";

    /**
     * Server Info endpoint
     */
    const INFO = "/info.json";

    /**
     * FiveM constructor.
     * @param string|null $hostname
     * @param int $port
     * @param bool $verify
     * @param string|null $authorization
     */
    public function __construct(string $hostname = null, int $port = 30120, bool $verify = true, string $authorization = null)
    {
        parent::__construct($hostname, $port, $verify, $authorization);
    }

    /**
     * Get players lists and infos
     *
     * @param bool $pretty Better format
     * @return array
     */
    public function all(bool $pretty = true): array
    {
        return [];
    }

    /**
     * Get players lists
     *
     * @return Players[]
     */
    public function players()
    {
        $collect = collect([]);
        $identifier = [];
        $response = json_decode($this->get(self::PLAYERS), false);
        foreach ($response as $key => $value) {
            for ($i = 0; $i < count($value->identifiers); ++$i) {
                $explode = explode(':', $value->identifiers[$i]);
                $identifier = $identifier + [$explode[0] => $explode[1]];
            }
            $collect->push([
                'network_id' => $value->id,
                'endpoint' => $value->endpoint,
                'name' => $value->name,
                'identifiers' => $identifier,
                'ping' => $value->ping,
            ]);
        }
        return json_decode(json_encode($collect->all())); // Shit flextape for fix non-object
    }

    /**
     * Get resources lists
     *
     * @return array
     */
    public function resources(): array
    {
        $response = json_decode($this->get(self::INFO));
        return (array)$response->resources;
    }

    /**
     * Get server vars info
     *
     * @return array
     */
    public function vars(): array
    {
        // TODO Better methods
        $response = json_decode($this->get(self::INFO));
        return (array)$response->vars;
    }
}
