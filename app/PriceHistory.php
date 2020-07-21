<?php declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PriceHistory extends Model
{
    protected $table = 'item_price_history';

    public function warehouseItem(): BelongsTo
    {
        return $this->belongsTo(WarehouseItem::class, 'id', 'item_id');
    }
}
