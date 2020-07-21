<?php declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Repositories\WarehouseItems\WarehouseItemRepositoryInterface',
            'App\Repositories\WarehouseItems\WarehouseItemRepository'
        );
    }
}
