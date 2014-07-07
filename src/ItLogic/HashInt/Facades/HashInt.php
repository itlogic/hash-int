<?php namespace ItLogic\HashInt\Facades;

use Illuminate\Support\Facades\Facade;

class HashInt extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'hashint'; }

}