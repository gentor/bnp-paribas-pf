<?php

namespace Gentor\BnpPF\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Bnp
 *
 * @package Gentor\BnpPF\Facades
 */
class Bnp extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'bnp';
    }
}
