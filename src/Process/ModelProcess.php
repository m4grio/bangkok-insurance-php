<?php

namespace m4grio\BangkokInsurance\Process;

use m4grio\BangkokInsurance\Client\ModelClient;

/**
 * Bangkok Insurance Model Process
 *
 * @package m4grio\BangkokInsurance\Process
 * @author  Mario Álvarez <ahoy@m4grio.me>
 */
class ModelProcess extends ProcessAbstract
{
    /**
     * @var string
     */
    protected $wsdl = 'PremiumProcess/wsdl/ModelProcess.wsdl';

    /**
     * @return string
     */
    public function getClient()
    {
        return ModelClient::class;
    }
}
