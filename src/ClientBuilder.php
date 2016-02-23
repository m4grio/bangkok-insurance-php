<?php

namespace m4grio\BangkokInsurance;

use m4grio\BangkokInsurance\Process\ProcessInterface;
use m4grio\BangkokInsurance\SoapClient\Factory;
use Psr\Log\LoggerInterface;

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
     * @var string
     */
    protected $client;

    /**
     * @var string
     */
    protected $agentCode;

    /**
     * @var string
     */
    protected $agentSeq;

    /**
     * @var LoggerInterface
     */
    protected $log;

    /**
     * @param $agentCode string
     *
     * @return $this
     */
    public function setAgentCode($agentCode)
    {
        $this->agentCode = $agentCode;

        return $this;
    }

    /**
     * @param $agentSeq
     *
     * @return $this
     */
    public function setAgentSeq($agentSeq)
    {
        $this->agentSeq = $agentSeq;

        return $this;
    }

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
        $this->setClient($process->getClient());

        return $this;
    }

    /**
     * @param $clientClass
     *
     * @return ClientBuilder
     */
    public function setClient($clientClass)
    {
        $this->client = $clientClass;

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
     * Build a new client's instance
     *
     * @return Client
     */
    public function build()
    {
        $soapClient = (new Factory)->getClient($this->getEndpoint(), $this->getSoapOptions());

        $params['user_id'] = $this->userId;
        $params['agent_code'] = $this->agentCode;
        $params['agent_seq'] = $this->agentSeq;
        $client = new $this->client($soapClient, $params);

        if ($this->log) {
            //
        }

        return $client;
    }

    /**
     * @return string
     */
    public function getEndpoint()
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
