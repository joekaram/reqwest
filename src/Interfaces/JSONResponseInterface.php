<?php
/**
 * @author karam 12/6/18
 */

namespace Reqwest\Interfaces;

interface JSONResponseInterface extends ResponseInterface
{
    /**
     * Get all the body of the response as an array.
     *
     * @return mixed
     */
    public function all();

    /**
     * Check if a field exists in the body.
     *
     * @param string $field
     *
     * @return boolean
     */
    public function has(string $field): bool;

    /**
     * Get a single field from the body of the response.
     *
     * @param string $field;
     *
     * @return mixed
     */
    public function get(string $field);
}