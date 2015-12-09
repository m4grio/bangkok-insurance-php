<?php

namespace m4grio\BangkokInsurance;

use m4grio\BangkokInsurance\Process\ProcessInterface;
use m4grio\BangkokInsurance\SoapClient\Factory;
use Psr\Log\LoggerInterface;
use SoapClient;

/**
 * SOAP Client builder
 *
 * @package m4grio\BangkokInsurance
 * @author  Mario Álvarez <ahoy@m4grio.me>
 */
class ClientBuilder
{
    /**
     * @var string
     */
    protected $wsdl;

    /**
     * @var string
     */
    protected $endpoint;

    /**
     * @var string
     */
    protected $userId;

    /**
     * @var ProcessInterface
     */
    protected $process;

    /**
     * @var LoggerInterface
     */
    protected $log;

    /**
     * @param $endpoint
     *
     * @return ClientBuilder
     */
    public function setEndpoint($endpoint)
    {
        $this->endpoint = rtrim($endpoint, '/');

        return $this;
    }

    /**
     * @param $userId
     *
     * @return ClientBuilder
     */
    public function setUserId($userId)
    {
        $this->userId = (string) $userId;

        return $this;
    }

    /**
     * @param ProcessInterface $process
     *
     * @return ClientBuilder
     */
    public function setProcess(ProcessInterface $process)
    {
        $this->process = $process;

        return $this;
    }

    /**
     * @param LoggerInterface $log
     *
     * @return ClientBuilder
     */
    public function setLog(LoggerInterface $log)
    {
        $this->log = $log;

        return $this;
    }

    /**
     * @return SoapClient
     */
    public function build()
    {
        $soapClient = (new Factory)->getClient($this->getEndpoint(), $this->getSoapOptions());

        if ($this->log) {
            //
        }

        return $soapClient;
    }

    /**
     * @return string
     */
    protected function getEndpoint()
    {
        $path = $this->getProcess()
            ->getWsdl()
        ;
        $path = ltrim($path, '/');
        $endpoint = sprintf('%s/%s', $this->endpoint, $path);

        return $endpoint;
    }

    /**
     * Build soap client options based on given process
     *
     * @return array
     */
    protected function getSoapOptions()
    {
        $options = [];
        $options['classmap'] = $this->getProcess()
            ->getClassmap()
        ;

        return $options;
    }

    /**
     * @return ProcessInterface
     */
    private function getProcess()
    {
        return $this->process;
    }
}
