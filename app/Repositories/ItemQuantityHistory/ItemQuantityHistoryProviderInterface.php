<?php declare(strict_types=1);

namespace App\Repositories\ItemQuantityHistory;

use Illuminate\Database\Eloquent\Collection;
use App\Repositories\BaseRepositoryInterface;

interface ItemQuantityHistoryProviderInterface extends BaseRepositoryInterface
{
    public function itemQuantityHistory(int $itemId): Collection;
}
