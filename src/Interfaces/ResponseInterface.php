<?php
/**
 * @author karam 12/6/18
 */

namespace Reqwest\Interfaces;


interface ResponseInterface
{
    /**
     * Get all the headers as an array.
     *
     * @return array
     */
    public function headers(): array;

    /**
     * Check if a header exists.
     *
     * @param string $name
     *
     * @return boolean
     */
    public function hasHeader(string $name): bool;

    /**
     * Get a single header by its name.
     *
     * @param string $name
     *
     * @return mixed
     */
    public function header(string $name);
}