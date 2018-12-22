<?php

namespace Arifsajal\BanglalinkSmsGatewayLaravel\Facades;

use Illuminate\Support\Facades\Facade;

class Banglalink extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'banglalinksmsgatewaylaravel';
    }
}