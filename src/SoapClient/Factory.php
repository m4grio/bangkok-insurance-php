<?php

namespace m4grio\BangkokInsurance\SoapClient;

use SoapClient;

/**
 * Soap Client Factory
 *
 * @package m4grio\BangkokInsurance\SoapClient
 * @author  Mario Álvarez <ahoy@m4grio.me>
 */
class Factory
{
    /**
     * @param       $wsdl
     * @param array $options
     *
     * @return SoapClient
     */
    public function getClient($wsdl, array $options = [])
    {
        $defaults = [
            'trace'    => 1,
            'features' => \SOAP_SINGLE_ELEMENT_ARRAYS,
        ];
        $options = array_merge($defaults, $options);
        $client = new SoapClient($wsdl, $options);

        return $client;
    }
}
