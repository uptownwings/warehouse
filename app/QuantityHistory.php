<?php declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuantityHistory extends Model
{
    use SoftDeletes;

    protected $table = 'item_quantity_history';

    public function warehouseItem(): BelongsTo
    {
        return $this->belongsTo(WarehouseItem::class, 'id', 'item_id');
    }
}
