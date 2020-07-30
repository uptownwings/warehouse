<?php declare(strict_types=1);

namespace App\Repositories\WarehouseItems;

use App\WarehouseItem;
use App\Http\Requests\UpdateItemRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface WarehouseItemRepositoryInterface
{
    public function getWarehouseItems(): Collection;

    public function getWarehouseData(int $paginationSize = 25): LengthAwarePaginator;

    public function getWarehouseItem(int $itemId): WarehouseItem;

    public function updateWarehouseItem(UpdateItemRequest $request): WarehouseItem;

    public function deleteWarehouseItem(int $itemId): bool;
}
