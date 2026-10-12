<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Override;

class Customer extends Model
{
    use HasUlids , SoftDeletes;

    protected $fillable = 
    [
        'name',
        'address',
        'lat',
        'lng',
        'requires_plastic',
        'delivery_placement',
        'caution_note',
        'memo',
    ];

    #[Override]
    protected function casts():array
    {
        return [
            'lat' => 'decimal:7',
            'lng' => 'decimal:7',
            'requires_plastic'=>'boolean',
        ];
    }

    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }

    public function routeStops(): HasMany
    {
        return $this->hasMany(RouteStop::class);
    }

    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }

    public function deliveryPauses(): HasMany
    {
        return $this->hasMany(DeliveryPause::class);
    }
}
