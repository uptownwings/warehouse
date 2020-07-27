<?php declare(strict_types=1);

namespace App\Repositories\WarehouseItems;

use Illuminate\Database\Eloquent\Collection;

interface WarehouseItemRepositoryInterface
{
    public function getWarehouseItems(): Collection;
}
