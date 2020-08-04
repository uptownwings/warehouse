<?php declare(strict_types=1);

namespace App\Repositories\ItemQuantityHistory;

use App\QuantityHistory;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class ItemQuantityHistoryRepository extends BaseRepository implements ItemQuantityHistoryRepositoryInterface
{
    public function __construct(QuantityHistory $model)
    {
        parent::__construct($model);
    }

    public function itemQuantityHistory(int $itemId): Collection
    {
        return $this->model::query()->where('item_id', '=', $itemId)->get();
    }
}
