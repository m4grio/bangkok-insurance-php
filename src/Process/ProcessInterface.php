<?php

namespace m4grio\BangkokInsurance\Process;

/**
 * Process Interface
 *
 * @package m4grio\BangkokInsurance\Process
 * @author  Mario Álvarez <ahoy@m4grio.me>
 */
interface ProcessInterface
{
    /**
     * @return string
     */
    public function getWsdl();

    /**
     * @return array
     */
    public function getClassmap();

    /**
     * @return string
     */
    public function getClient();
}
