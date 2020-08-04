<?php declare(strict_types=1);

namespace App\Repositories\WarehouseItems;

use App\WarehouseItem;
use App\Repositories\BaseRepository;
use App\Http\Requests\UpdateItemRequest;
use App\Http\Requests\WarehouseItemCreateRequest;
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

    public function updateWarehouseItem(UpdateItemRequest $request): WarehouseItem
    {
        $item = $this->model::query()->find($request->id)->first();
        if (null !== $item) {
            $item->name = $request->name;
            $item->EAN = $request->EAN;
            $item->type = $request->type;
            $item->weight = $request->weight;
            $item->color = $request->color;
            $item->active = $request->active;
            $item->quantity = $request->quantity;
            $item->price = $request->price;
            $item->save();
        }

        return $item;
    }

    public function deleteWarehouseItem(int $itemId): bool
    {
        return $this->model::query()->find($itemId)->delete();
    }

    public function createWarehouseItem(WarehouseItemCreateRequest $request): bool
    {
        $item = new WarehouseItem();
        $item->name = $request->name;
        $item->EAN = $request->EAN;
        $item->type = $request->type;
        $item->weight = $request->weight;
        $item->color = $request->color;
        $item->active = $request->active;
        $item->quantity = $request->quantity;
        $item->price = $request->price;

        return $item->save();
    }
}
