<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'liste_id',
        'visitor_name',
        'visitor_email',
        'due_date'
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
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
