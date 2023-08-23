<?php

namespace C6Digital\FilamentPlausiblePage\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \C6Digital\FilamentPlausiblePage\FilamentPlausiblePage
 */
class FilamentPlausiblePage extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \C6Digital\FilamentPlausiblePage\FilamentPlausiblePage::class;
    }
}
