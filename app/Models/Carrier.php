<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Carrier extends Model
{
    use HasUlids;

    protected $fillable = ['name','phone','is_active'];

    protected function casts() : array 
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function shop():BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }

    public function routes(): HasMany
    {
        return $this->hasMany(Route::class);
    }
}
