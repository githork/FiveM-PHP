<?php

namespace FiveM;

interface RequestInterface
{

    /**
     * @return mixed
     */
    public function status();

    /**
     * @return mixed
     */
    public function get();

    /**
     * @return mixed
     */
    public function getPlayers();

    /**
     * @return mixed
     */
    public function getResources();

    /**
     * @return mixed
     */
    public function getInfos();

    /**
     * @return mixed
     */
    public function getRequest();


}