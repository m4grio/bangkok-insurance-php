<?php

namespace m4grio\BangkokInsurance;

use m4grio\BangkokInsurance\Result\AbstractResult;
use SoapClient;
use SoapFault;

/**
 * Bangkok Insurance API Client
 *
 * @package m4grio\BangkokInsurance
 * @author  Mario Álvarez <ahoy@m4grio.me>
 */
class Client
{
    /**
     * Instance of an actual Soap Client
     *
     * @var SoapClient
     */
    protected $soapClient;

    /**
     * Default set of data to be sent on each client's request
     *
     * @var array
     */
    protected $defaultParams = [];

    /**
     * @param SoapClient $client
     * @param array      $defaultParams
     */
    public function __construct(SoapClient $client, Array $defaultParams = [])
    {
        $this->soapClient = $client;
        if (true === (bool) sizeof($defaultParams)) {
            $this->defaultParams = $defaultParams;
        }
    }

    /**
     * Prepare and issue a call
     *
     * @param       $method
     * @param array $params
     *
     * @return AbstractResult
     *
     * @throws SoapFault
     * @throws \Exception
     */
    public function call($method, Array $params = [])
    {
        $params = [$method => array_merge($this->defaultParams, $params)];
        try {
            $result = $this->soapClient->__soapCall($method, $params);
        } catch (SoapFault $fault) {
            // @todo log
            throw $fault;
        }

        return $result;
    }
}
