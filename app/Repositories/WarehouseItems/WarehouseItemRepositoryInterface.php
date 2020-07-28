<?php declare(strict_types=1);

namespace App\Repositories\WarehouseItems;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface WarehouseItemRepositoryInterface
{
    public function getWarehouseItems(): Collection;

    public function getWarehouseData(int $paginationSize = 25): LengthAwarePaginator;
}
