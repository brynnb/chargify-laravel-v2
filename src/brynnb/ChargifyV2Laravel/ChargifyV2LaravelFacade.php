<?php
namespace brynnb\ChargifyV2Laravel;
use Illuminate\Support\Facades\Facade;
class ChargifyV2LaravelFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'chargifyv2';
    }
}