<?php declare(strict_types=1);

namespace App\Repositories\ItemPriceHistory;

use Illuminate\Database\Eloquent\Collection;
use App\Repositories\BaseRepositoryInterface;

interface ItemPriceHistoryRepositoryInterface extends BaseRepositoryInterface
{
    public function itemPriceHistory(int $itemId): Collection;
}
