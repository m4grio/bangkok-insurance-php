<?php
/**
 * Created by PhpStorm.
 * User: m4grio
 * Date: 29/2/2016
 * Time: 12:36
 */

namespace m4grio\BangkokInsurance\Client;

/**
 * Allow clients to remap its parameters before calling the API
 *
 * @package m4grio\BangkokInsurance\Client
 * @author  Mario Álvarez <ahoy@m4grio.me>
 */
trait ParamsMapperTrait
{
    /**
     * Merge and remap params
     *
     * @param       $method
     * @param array $params
     *
     * @return mixed
     */
    public function mergeParams($method, Array $params = [])
    {
        $result = parent::mergeParams($method, $params);

        foreach ($this->map as $oldKey => $newKey)
        {
            if (array_key_exists($oldKey, $result[$method])) {
                $result[$method][$newKey] = $result[$method][$oldKey];
                $result[$method][$oldKey] = null;
                unset($result[$method][$oldKey]);
            }
        }

        return $result;
    }
}
