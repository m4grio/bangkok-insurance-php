<?php

namespace m4grio\BangkokInsurance\Process;

use m4grio\BangkokInsurance\Client\PremiumClient;
use m4grio\BangkokInsurance\Result\Premium\CalculatorVoluntaryResult;

/**
 * Bangkok Insurance Premium Process
 *
 * @package m4grio\BangkokInsurance\Process
 * @author  Mario Álvarez <ahoy@m4grio.me>
 */
class PremiumProcess extends ProcessAbstract
{
    /**
     * @var string
     */
    protected $wsdl = 'PremiumProcess/wsdl/PremiumProcess.wsdl';

    /**
     * @var array
     */
    protected $classmap = [
        'VolPremiumBean' => CalculatorVoluntaryResult::class,
    ];

    /**
     * @return string
     */
    public function getClient()
    {
        return PremiumClient::class;
    }
}
