<?php

namespace Gentor\BnpPF;

use Exception;

/**
 * Class BnpError
 *
 * @package Gentor\BnpPF
 */
class BnpError extends Exception
{
    /**
     * @var string|null
     */
    protected $details;

    /**
     * BnpError constructor.
     *
     * @param string          $message
     * @param int             $code
     * @param string|null            $details
     * @param \Exception|null $previous
     */
    public function __construct($message = "", $code = 0, $details = null, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->details = $details;
    }

    /**
     * @return string|null
     */
    public function getDetails()
    {
        return $this->details;
    }
}