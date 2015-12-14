<?php

namespace m4grio\BangkokInsurance\Result;

/**
 * Abstract Result
 *
 * @package m4grio\BangkokInsurance\Result
 * @author  Mario Álvarez <ahoy@m4grio.me>
 */
abstract class AbstractResult
{
    public $response_code;
    public $response_desc;

    /**
     * Determines if the response is an error
     *
     * @todo
     *
     * @return bool
     */
    public function isError()
    {
        //
    }
}
