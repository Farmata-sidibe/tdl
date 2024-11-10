<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cagnotte extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_amount',
        'current_amount',
        'is_active'
    ];

    /**
     * The cagnotte that belong to the Liste
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function liste(): BelongsTo
    {
        return $this->belongsTo(Liste::class);
    }
}
