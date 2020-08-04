<?php declare(strict_types=1);

namespace App\Repositories\ItemPriceHistory;

use App\PriceHistory;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class ItemPriceHistoryRepository extends BaseRepository implements ItemPriceHistoryRepositoryInterface
{
    public function __construct(PriceHistory $model)
    {
        parent::__construct($model);
    }

    public function itemPriceHistory(int $itemId): Collection
    {
        return $this->model::query()
        ->where('item_id', '=', $itemId)
        ->where('created_at', '>=', Carbon::now()->subDays(90))
        ->orderBy('id')
        ->get();
    }


}
