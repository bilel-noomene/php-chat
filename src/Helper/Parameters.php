<?php

namespace App\Helper;

/**
 * Parameters model to help working with parameters.
 */
class Parameters
{
    /**
     * @var array
     */
    private $params;

    /**
     * Parameters constructor.
     * @param array $params
     */
    public function __construct(array $params)
    {
        $this->params = $params;
    }

    /**
     * Return all parameters as an array.
     *
     * @return array
     */
    public function all(): array
    {
        return $this->params;
    }

    /**
     * Check if the parameters contains an item with a specific key.
     *
     * @param $key
     * @return bool
     */
    public function has($key): bool
    {
        return \array_key_exists($key, $this->params);
    }

    /**
     * Retrieve parameter by key.
     *
     * @param $key
     * @return mixed|null
     */
    public function get($key)
    {
        return $this->has($key) ? $this->params[$key] : null;
    }

    /**
     * Check if the parameter exists and not empty.
     *
     * @param $key
     * @return bool
     */
    public function notEmpty($key)
    {
        return $this->has($key) && !empty($key);
    }



}