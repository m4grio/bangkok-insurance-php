<?php

namespace m4grio\BangkokInsurance\Client;

/**
 * BeansTrait
 *
 * @todo Stop using params to construct beans but receive them on the setter instead
 *
 * @package m4grio\BangkokInsurance\Client
 * @author  Mario Álvarez <ahoy@m4grio.me>
 */
trait BeansTrait
{
    /**
     * @var array
     */
    protected $beans = [];

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

    /**
     * @param array $bean
     *
     * @return $this
     */
    public function addBean(Array $bean = [])
    {
        return $this;
    }
}
