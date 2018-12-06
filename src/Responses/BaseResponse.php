<?php
/**
 * @author karam 12/6/18
 */

namespace Reqwest\Responses;

use Reqwest\Interfaces\ResponseInterface;

abstract class BaseResponse implements ResponseInterface
{
    /**
     * The original response received.
     *
     * @var mixed
     */
    protected $response;

    /**
     * The status code of the response.
     *
     * @var int
     */
    protected $status_code;

    /**
     * The headers of the response.
     *
     * @var array
     */
    protected $headers;

    /**
     * Create a new response instance.
     *
     * @param mixed $response
     *
     * @return void
     */
    public function __construct($response)
    {
        $this->response = $response;
        $this->headers = $response
            ? $response->getHeaders()
            : [];
        $this->status_code = $response
            ? $response->getStatusCode()
            : 0;
    }

    /**
     * Get the status code of the response.
     *
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->status_code;
    }

    /**
     * Get all the headers as an array.
     *
     * @return array
     */
    public function headers(): array
    {
        return $this->headers;
    }

    /**
     * Check if a header exists.
     *
     * @param string $name
     *
     * @return boolean
     */
    public function hasHeader(string $name): bool
    {
        return array_key_exists($name, $this->headers);
    }

    /**
     * Get a single header by its name.
     *
     * @param string $name
     *
     * @return mixed
     */
    public function header(string $name)
    {
        return $this->hasHeader($name) ? $this->headers[$name] : null;
    }
}