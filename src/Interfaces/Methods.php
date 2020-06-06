<?php


namespace FiveM\Interfaces;

use Players;

/**
 * Interface Methods
 *
 * Methods for FiveM Class
 *
 * @package Vendor\Package\Interfaces
 */
interface Methods
{
    /**
     * Get players lists and infos
     *
     * @param bool $pretty Better format
     * @return array
     */
    public function all(bool $pretty = true): array;

    /**
     * Get players lists
     *
     * @return Players[]
     */
    public function players();

    /**
     * Get resources lists
     *
     * @return array
     */
    public function resources(): array;

    /**
     * Get server vars info
     *
     * @return array
     */
    public function vars(): array;

}
