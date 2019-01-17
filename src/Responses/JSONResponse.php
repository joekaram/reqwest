<?php
/**
 * @author karam 12/6/18
 */

namespace Reqwest\Responses;

use Reqwest\Interfaces\JSONResponseInterface;

class JSONResponse extends BaseResponse implements JSONResponseInterface
{
    /**
     * The body of the response.
     *
     * @var array
     */
    protected $body;

    /**
     * Create a new response instance.
     *
     * @param mixed $response
     *
     * @return void
     */
    public function __construct($response)
    {
        parent::__construct($response);
        $this->body = [ 'message' => 'Failed to make request.' ];
        if($response)
            $this->body = json_decode($response->getBody(), true) ?? [];
    }

    /**
     * Get all the body of the response as an array.
     *
     * @return mixed
     */
    public function all()
    {
        return $this->body;
    }

    /**
     * Check if a field exists in the body.
     *
     * @param string $field
     *
     * @return boolean
     */
    public function has(string $field): bool
    {
        return array_key_exists($field, $this->body);
    }

    /**
     * Get a single field from the body of the response.
     *
     * @param string $field;
     *
     * @return mixed
     */
    public function get(string $field)
    {
        return $this->has($field) ? $this->body[$field] : null;
    }
}