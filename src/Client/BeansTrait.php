<?php

namespace m4grio\BangkokInsurance\Client;

/**
 * BeansTrait
 *
 * @package m4grio\BangkokInsurance\Client
 * @author  Mario Álvarez <ahoy@m4grio.me>
 */
trait BeansTrait
{
    /**
     * Group params in a bean
     *
     * @param       $method
     * @param array $params
     *
     * @return array
     */
    public function mergeParams($method, Array $params = [])
    {
        $newParams = [];
        $preparedParams = $this->defaultParams;
        $preparedParams['bean'] = $params;

        $newParams[$method] = $preparedParams;

        return $newParams;
    }
}