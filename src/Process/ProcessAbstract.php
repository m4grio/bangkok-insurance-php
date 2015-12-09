<?php

namespace m4grio\BangkokInsurance\Process;

/**
 * Abstract Process
 *
 * @package m4grio\BangkokInsurance\Process
 * @author  Mario Álvarez <ahoy@m4grio.me>
 */
abstract class ProcessAbstract implements ProcessInterface
{
    /**
     * @var string
     */
    protected $wsdl;

    /**
     * @var array
     */
    protected $classmap;

    /**
     * @return string
     */
    public function getWsdl()
    {
        return $this->wsdl;
    }

    /**
     * @return array
     */
    public function getClassmap()
    {
        return $this->classmap;
    }
}
