<?php declare(strict_types=1);

namespace App\Repositories\WarehouseItems;

use App\WarehouseItem;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class WarehouseItemRepository extends BaseRepository implements WarehouseItemRepositoryInterface
{
    public function __construct(WarehouseItem $model)
    {
        parent::__construct($model);
    }

    public function getWarehouseItems(): Collection
    {
        return $this->showAll();
    }

    public function getWarehouseData(int $paginationSize = 25): LengthAwarePaginator
    {
        return WarehouseItem::query()->paginate($paginationSize);
    }

    public function getWarehouseItem(int $itemId): WarehouseItem
    {
        return $this->model::query()->find($itemId)->first();
    }
}
