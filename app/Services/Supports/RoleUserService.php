<?php

namespace App\Services\Supports;

use App\Services\RoleUserService as SupportService;
use Illuminate\Support\Facades\Facade;

class RoleUserService extends Facade
{
	/**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return SupportService::class;
    }
}
