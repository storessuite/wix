<?php

namespace StoresSuite\Wix\Facades;

use Illuminate\Support\Facades\Facade;

class Wix extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'wix';
    }
}
