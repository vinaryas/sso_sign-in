<?php

namespace App\Services\Supports;

use App\Services\UserStoreService as SupportService;
use Illuminate\Support\Facades\Facade;

class UserStoreService extends Facade
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
