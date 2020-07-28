<?php declare(strict_types=1);

namespace App\Repositories\WarehouseItems;

use App\WarehouseItem;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

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
}
