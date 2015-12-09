<?php

namespace m4grio\BangkokInsurance\Process;

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
        'calculator' => '',
        'calculator_comp_prem' => '',
        'calculator_vol_prem' => '',
    ];
}
