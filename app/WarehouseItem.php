<?php declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WarehouseItem extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'EAN',
        'type',
        'weight',
        'color',
        'active',
        'quantity',
        'price'
    ];

    public static function boot()
    {
        parent::boot();
        self::deleting(function ($warehouseItem) {
            $warehouseItem->priceHistory()->each(function ($priceHistory) {
                $priceHistory->delete();
            });
            $warehouseItem->quantityHistory()->each(function ($quantityHistory) {
                $quantityHistory->delete();
            });
        });
    }

    public function priceHistory(): hasMany
    {
        return $this->hasMany(PriceHistory::class, 'item_id', 'id');
    }

    public function quantityHistory(): hasMany
    {
        return $this->hasMany(QuantityHistory::class, 'item_id', 'id');
    }
}
