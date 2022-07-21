<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\ServiceProvider;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add([
                'text' => 'Dashboard',
                'url' => route('home'),
                'icon' => 'fas fa-tachometer-alt',
                'active' => ['home'],
            ]);
            $event->menu->add([
                'text' => 'Aplikasi',
                'url' => route('aplikasi.index'),
                'icon' => 'fas fa-bullseye',
                'active' => ['aplikasi.index'],
            ]);

            $event->menu->add([
                'text' => 'Region',
                'url' => route('region.index'),
                'icon' => 'fas fa-bullseye',
                'active' => ['region.index'],
            ]);

            $event->menu->add([
                'text' => 'User',
                'url' => route('user.index'),
                'icon' => 'fas fa-bullseye',
                'active' => ['user.index'],
            ]);

            $event->menu->add([
                'text' => 'Role',
                'icon' => 'fas fa-user-shield',
                'submenu' => [
                    [
                        'text' => 'Role',
                        'url' => route('role.index'),
                        'icon' => 'fas fa-bullseye',
                        'active' => ['role.index'],
                    ],
                    [
                        'text' => 'Role User',
                        'url' => route('role_user.index'),
                        'icon' => 'fas fa-bullseye',
                        'active' => ['role_user.index'],
                    ],
                ],
            ]);

            $event->menu->add([
                'text' => 'Permission',
                'icon' => 'fas fa-user-shield',
                'submenu' => [
                    [
                        'text' => 'Permission',
                        'url' => route('permission.index'),
                        'icon' => 'fas fa-bullseye',
                        'active' => ['permission.index'],
                    ],
                    [
                        'text' => 'Permission Role',
                        'url' => route('permission_role.index'),
                        'icon' => 'fas fa-bullseye',
                        'active' => ['permission_role.index'],
                    ],
                ],
            ]);

            $event->menu->add([
                'text' => 'Store',
                'icon' => 'fas fa-user-shield',
                'submenu' => [
                    [
                        'text' => 'Store',
                        'url' => route('store.index'),
                        'icon' => 'fas fa-bullseye',
                        'active' => ['store.index'],
                    ],
                    [
                        'text' => 'Store User',
                        'url' => route('user_store.index'),
                        'icon' => 'fas fa-bullseye',
                        'active' => ['user_store.index'],
                    ],
                ],
            ]);
        });
    }
}
