<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shop extends Model
{
    use HasUlids;

    protected $fillable = ['name'];

    public function users(): HasMany{
        return $this->hasMany(User::class);
    }

    public function areas(): HasMany{
        return $this->hasMany(Area::class);
    }

    public function carriers(): HasMany{
        return $this->hasMany(Carrier::class);
    }

    public function routes(): HasMany{
        return $this->hasMany(Route::class);
    }

    public function customers(): HasMany{
        return $this->hasMany(Customer::class);
    }

    public function newspapers(): HasMany{
        return $this->hasMany(Newspaper::class);
    }

    public function changeLogs():HasMany
    {
        return $this->hasMany(ChangeLog::class);
    }
    
    
}
