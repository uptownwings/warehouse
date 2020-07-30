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
        $this->app->bind(
            'App\Repositories\Users\UserRepositoryInterface',
            'App\Repositories\Users\UserRepository'
        );
        $this->app->bind(
            'App\Repositories\PasswordResets\PasswordResetRepositoryInterface',
            'App\Repositories\PasswordResets\PasswordResetRepository'
        );
        $this->app->bind(
            'App\Repositories\ItemPriceHistory\ItemPriceHistoryRepositoryInterface',
            'App\Repositories\ItemPriceHistory\ItemPriceHistoryRepository'
        );
    }
}
