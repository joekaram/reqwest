<?php
/**
 * @author karam 12/6/18
 */

namespace Reqwest\Interfaces;

interface RequestInterface
{
    /**
     * Make a get request.
     *
     * @param string $url
     *
     * @return ResponseInterface
     */
    public function get(string $url): ResponseInterface;

    /**
     * Make a post request.
     *
     * @param string $url
     * @param array $body
     *
     * @return ResponseInterface
     */
    public function post(string $url, array $body = []): ResponseInterface;

    /**
     * Make a put request.
     *
     * @param string $url
     * @param array $body
     *
     * @return ResponseInterface
     */
    public function put(string $url, array $body = []): ResponseInterface;

    /**
     * Make a patch request.
     *
     * @param string $url
     * @param array $body
     *
     * @return ResponseInterface
     */
    public function patch(string $url, array $body = []): ResponseInterface;

    /**
     * Make a delete request.
     *
     * @param string $url
     *
     * @return ResponseInterface
     */
    public function delete(string $url): ResponseInterface;
}