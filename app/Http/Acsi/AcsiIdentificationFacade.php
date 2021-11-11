<?php

namespace Illuminate\Support\Facades;

use App\Http\Acsi\AcsiIdentification;
use Illuminate\Support\Facades\Facade;

class AcsiIdentificationFacade extends Facade{

    protected static function getFacadeAccessor()
    {
        return AcsiIdentification::class;
    }
}