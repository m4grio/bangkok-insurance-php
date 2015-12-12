<?php

namespace m4grio\BangkokInsurance\SoapClient;

use SoapClient as NativeSoapClient;

/**
 * Custom SoapClient
 *
 * @package m4grio\BangkokInsurance\SoapClient
 * @author  Mario Álvarez <ahoy@m4grio.me>
 */
class SoapClient extends NativeSoapClient
{

    /**
     * @param string $functionName
     * @param array  $arguments
     * @param null   $options
     * @param null   $inputHeaders
     * @param null   $outputHeaders
     *
     * @return mixed
     */
    public function __soapCall($functionName, $arguments, $options = NULL, $inputHeaders = NULL, &$outputHeaders = NULL)
    {
        return parent::__soapCall($functionName, $arguments, $options, $inputHeaders, $outputHeaders);
    }

    /**
     * Maps this deprecated method to the correct one
     *
     * @param string $functionName
     * @param string $arguments
     *
     * @return mixed
     */
    public function __call($functionName, $arguments)
    {
        return $this->__soapCall($functionName, $arguments);
    }
}
