<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Owners extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];
    
    public function dogOwners(): HasMany {
        return $this->hasMany(DogOwners::class);
    }

    public function dogs(): BelongsToMany {
        return $this->belongsToMany(Dogs::class);
    }
}
