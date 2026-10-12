<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Area extends Model
{
    use HasUlids;

    protected $fillable = ['name'];

    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }

    public function routes(): BelongsTo
    {
        return $this->belongsTo(Route::class);
    }
}
