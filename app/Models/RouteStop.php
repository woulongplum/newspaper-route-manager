<?php

namespace App\Models;

use App\Enums\Edition;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Override;

class RouteStop extends Model
{
    use HasUlids;

    protected $fillable = [ 
        'route_id',
        'customer_id',
        'edition',
        'position',
    ];

    
    protected function casts(): array
    {
        return [
            'edition' =>Edition::class,
            'position' => 'integer',
        ];
    }

    public function route(): BelongsTo
    {
        return $this->belongsTo(Route::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
