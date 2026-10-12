<?php

namespace App\Models;

use App\Enums\Edition;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscription extends Model
{
    use HasUlids;

    protected $fillable = [
        'customer_id',
        'newspaper_id',
        'edition',
        'quantity',
        'start_date',
        'end_date',
    ];

    
    protected function casts() : array
    {
        return [
            'edhition' => Edition::class,
            'quantity' => 'integer',
            'start_date' => 'date',
            'end_date'=> 'date,'
        ];
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function newspaper(): BelongsTo
    {
        return $this->belongsTo(Newspaper::class);
    }

    public function scopeActiveOn(Builder $query, CarbonInterface $date): Builder
    {
        return $query
            ->whereDate('start_date', '<=', $date)
            ->where(function (Builder $q) use ($date) {
                $q->whereNull('end_date')
                    ->orWhereDate('end_date', '>=', $date);
            });
    }
}
