<?php

namespace App\Models;

use App\Enums\Edition;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Route extends Model
{
    use HasUlids;

    protected $fillable = [
        'area_id',
        'carrier_id',
        'edition',
        'name',
        'start_name',
        'start_lat',
        'start_lng',
        'last_confirmed_on',
    ];

    protected function casts(): array
    {
        return [
            'edition' => Edition::class,
            'start_lat' => 'decimal:7',
            'start_lng' => 'decimal:7',
            'last_confirmed_on' => 'date',
        ];
    }

     public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }

    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }

    public function carrier(): BelongsTo
    {
        return $this->belongsTo(Carrier::class);
    }

    public function stops(): HasMany
    {
        return $this->hasMany(RouteStop::class)->orderBy('position');
    }

    public function changeLogs(): HasMany
    {
        return $this->hasMany(ChangeLog::class);
    }
}
