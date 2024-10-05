<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Walks extends Model
{
    use HasFactory;

    public function dogOwner(): BelongsTo {
        return $this->belongsTo(DogOwners::class);
    }

}
