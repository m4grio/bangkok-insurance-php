<?php

namespace m4grio\BangkokInsurance\Process;

use m4grio\BangkokInsurance\Client\TransferClient;

/**
 * Bangkok Insurance Transfer Process
 *
 * @package m4grio\BangkokInsurance\Process
 * @author Mario Álvarez <ahoy@m4grio.me>
 */
class TransferProcess extends ProcessAbstract
{
    /**
     * @var string
     */
    protected $wsdl = 'TransferProcess/wsdl/TransferProcess.wsdl';

    /**
     * @return string
     */
    public function getClient()
    {
        return TransferClient::class;
    }
}
