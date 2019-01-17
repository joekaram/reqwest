<?php
/**
 * @author karam 12/6/18
 */

namespace Reqwest\Requests;

use Reqwest\Responses\JSONResponse;
use Reqwest\Interfaces\ResponseInterface;
use GuzzleHttp\Exception\RequestException;

class JSONRequest extends BaseRequest
{
    /**
     * Get headers for request.
     *
     * @return array
     */
    public function getHeaders(): array
    {
        $this->headers['content-type'] = 'application/json';
        return $this->headers;
    }

    /**
     * Make a get request.
     *
     * @param string $url
     *
     * @return ResponseInterface
     * @throws \GuzzleHttp\Exception\RequestException
     */
    public function get(string $url): ResponseInterface
    {
        $options = [ "headers" => $this->getHeaders() ];
        $response = null;
        try {
            $response = $this->http->request("GET", $url, $options);
        } catch(RequestException $e) {
            $response = $e->getResponse();
        }
        return new JSONResponse($response);
    }

    /**
     * Make a post request.
     *
     * @param string $url
     * @param array $body
     *
     * @return ResponseInterface
     * @throws \GuzzleHttp\Exception\RequestException
     */
    public function post(string $url, array $body = []): ResponseInterface
    {
        $options = [
            "headers" => $this->getHeaders(),
            "body" => json_encode($body)
        ];
        $response = null;
        try {
            $response = $this->http->request("POST", $url, $options);
        } catch(RequestException $e) {
            $response = $e->getResponse();
        }
        return new JSONResponse($response);
    }

    /**
     * Make a put request.
     *
     * @param string $url
     * @param array $body
     *
     * @return ResponseInterface
     * @throws \GuzzleHttp\Exception\RequestException
     */
    public function put(string $url, array $body = []): ResponseInterface
    {
        $options = [
            "headers" => $this->getHeaders(),
            "body" => json_encode($body)
        ];
        $response = null;
        try {
            $response = $this->http->request("PUT", $url, $options);
        } catch(RequestException $e) {
            $response = $e->getResponse();
        }
        return new JSONResponse($response);
    }

    /**
     * Make a patch request.
     *
     * @param string $url
     * @param array $body
     *
     * @return ResponseInterface
     * @throws \GuzzleHttp\Exception\RequestException
     */
    public function patch(string $url, array $body = []): ResponseInterface
    {
        $options = [
            "headers" => $this->getHeaders(),
            "body" => json_encode($body)
        ];
        $response = null;
        try {
            $response = $this->http->request("PATCH", $url, $options);
        } catch(RequestException $e) {
            $response = $e->getResponse();
        }
        return new JSONResponse($response);
    }

    /**
     * Make a delete request.
     *
     * @param string $url
     *
     * @return ResponseInterface
     * @throws \GuzzleHttp\Exception\RequestException
     */
    public function delete(string $url): ResponseInterface
    {
        $options = [ "headers" => $this->getHeaders() ];
        $response = null;
        try {
            $response = $this->http->request("DELETE", $url, $options);
        } catch(RequestException $e) {
            $response = $e->getResponse();
        }
        return new JSONResponse($response);
    }
}