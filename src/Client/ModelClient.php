<?php

namespace m4grio\BangkokInsurance\Client;

use m4grio\BangkokInsurance\Client;

/**
 * Class ModelClient
 *
 * @package m4grio\BangkokInsurance\Client
 * @author  Mario Álvarez <ahoy@m4grio.me>
 */
class ModelClient extends Client
{
    use ParamsMapperTrait;

    protected $map = [
        'user_id' => 'UserID',
    ];

    /**
     * @param       $method
     * @param array $params
     *
     * @return mixed
     * @throws \Exception
     * @throws \SoapFault
     */
    public function call($method, Array $params = [])
    {
        $rawResult = parent::call($method, $params);

        switch ($method) {
            case 'GetCarBrandAndModel':
                $result = $rawResult->GetCarBrandAndModelReturn;
            break;

            case 'GetCarBrand':
                $result = $rawResult->GetCarBrandReturn->x_car_brand->string;
        }

        return $result;
    }
}
