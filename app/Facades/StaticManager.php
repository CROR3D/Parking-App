<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class StaticManager extends Facade {

    protected static function getFacadeAccessor()
    {
        return 'staticmanager';
    }

}
