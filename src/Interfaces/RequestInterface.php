<?php

namespace FiveM;

interface RequestInterface
{

    /**
     * @return false|mixed|string
     */
    public function status();

    /**
     * @return false|mixed|string
     */
    public function get();

    /**
     * @return false|mixed|string
     */
    public function getPlayers();

    /**
     * @return false|mixed|string
     */
    public function getResources();

    /**
     * @return false|mixed|string
     */
    public function getInfos();

    /**
     * @return false|mixed|string
     */
    public function getRequest();


}