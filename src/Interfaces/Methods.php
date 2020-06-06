<?php


namespace Vendor\Package\Interfaces;

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
     * @return array
     */
    public function all(): array;

    /**
     * Get players lists
     *
     * @return array
     */
    public function players(): array;

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
