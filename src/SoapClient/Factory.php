<?php

namespace m4grio\BangkokInsurance\SoapClient;

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
            'trace'    => true,
            'features' => \SOAP_SINGLE_ELEMENT_ARRAYS,
            'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP,
        ];
        $options = array_merge($defaults, $options);
        $client = new SoapClient($wsdl, $options);

        return $client;
    }
}
