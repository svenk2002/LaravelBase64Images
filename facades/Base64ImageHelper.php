<?php

namespace SvenK\LaravelBase64Images\Facades;

use Illuminate\Support\Facades\Facade;

class Base64ImageHelper extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'base64imagehelper';
    }
}
