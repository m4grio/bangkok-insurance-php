<?php

namespace m4grio\BangkokInsurance\Client;

use m4grio\BangkokInsurance\Client;
use m4grio\BangkokInsurance\Result\PremiumResult;

/**
 * Class PremiumClient
 *
 * @package m4grio\BangkokInsurance\Client
 * @author  Mario Álvarez <ahoy@m4grio.me>
 */
class PremiumClient extends Client
{

    /**
     * @param       $method
     * @param array $params
     *
     * @return PremiumResult
     */
    public function call($method, Array $params = [])
    {
        $rawResult = parent::call($method, $params);

        /**
         * I know this is just awful; will do it properly later on
         *
         * @todo
         */
        switch ($method) {
            case 'calculator_vol_prem':
                $result = $rawResult->calculator_vol_premReturn->VolPremiumBean;
                break;

            case 'calculator_comp_prem':
                break;
        }

        return $result;
    }
}
