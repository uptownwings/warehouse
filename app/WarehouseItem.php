<?php declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WarehouseItem extends Model
{
    protected $fillable = [
        'name', 'EAN', 'type', 'weight', 'color', 'active', 'quantity', 'price'
    ];

    public function priceHistory(): hasMany
    {
        return $this->hasMany(PriceHistory::class, 'item_id', 'id');
    }

    public function quantityHistory(): hasMany
    {
        return $this->hasMany(QuantityHistory::class, 'item_id', 'id');
    }
}
