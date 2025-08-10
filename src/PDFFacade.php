<?php

namespace RMS\PDF;

use Illuminate\Support\Facades\Facade;

class PDFFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'pdf';
    }
}
