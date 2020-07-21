<?php declare(strict_types=1);

namespace App\Repositories\WarehouseItems;

use App\User;
use App\WarehouseItem;
use App\Repositories\BaseRepository;

class WarehouseItemRepository extends BaseRepository implements WarehouseItemRepositoryInterface
{
    public function __construct(WarehouseItem $model)
    {
        parent::__construct($model);
    }

}
