<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FilmDirector extends Model
{
    use HasFactory;

    public function director(): BelongsTo
    {
        return $this->belongsTo(Director::class);
    }

    public function film(): BelongsTo
    {
        return $this->belongsTo(Film::class);
    }
}
