<?php

namespace App\Helpers\valida;

use Illuminate\Support\Facades\Facade;

class ValidaFacade extends Facade {

    protected static function getFacadeAccessor()
    {
        return 'ValidaHelper';
    }
}
