<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class GlobalHelperFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'globalHelper';
    }
}
