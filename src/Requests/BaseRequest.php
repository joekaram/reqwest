<?php
/**
 * @author karam 12/6/18
 */

namespace Reqwest\Requests;

use GuzzleHttp\Client;
use Reqwest\Interfaces\RequestInterface;

abstract class BaseRequest implements RequestInterface
{
    /**
     * The http client used to make requests.
     *
     * @var \GuzzleHttp\Client;
     */
    protected $http;

    /**
     * The headers to be sent in the request.
     *
     * @var array
     */
    protected $headers;

    /**
     * Create a new request instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->http = new Client();
        $this->headers = [];
    }

    /**
     * Get the headers of the request. Some
     * requests may add necessary headers.
     *
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * Add a new header.
     *
     * @param string $name
     * @param string $value
     *
     * @return BaseRequest
     */
    public function addHeader(string $name, string $value): BaseRequest
    {
        $this->headers[$name] = $value;
        return $this;
    }

    /**
     * Add multiple headers.
     *
     * @param array $headers
     *
     * @return BaseRequest
     */
    public function addHeaders(array $headers): BaseRequest
    {
        $this->headers = array_merge($this->headers, $headers);
        return $this;
    }

    /**
     * Update an existing header. If a header doesn't
     * exists, it will be automatically created.
     *
     * @param string $name
     * @param string $value
     *
     * @return BaseRequest
     */
    public function updateHeader(string $name, string $value): BaseRequest
    {
        $this->headers[$name] = $value;
        return $this;
    }

    /**
     * Delete an existing header if it exists.
     *
     * @param string $name
     *
     * @return BaseRequest
     */
    public function deleteHeader(string $name): BaseRequest
    {
        unset($this->headers[$name]);
        return $this;
    }
}