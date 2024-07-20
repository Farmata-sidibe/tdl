<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'amount',
        'date_contribution',
        'product_id',
        'cagnotte_id',
    ];

     /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date_contribution' => 'datetime',
    ];


    public function cagnotte()
    {
        return $this->belongsTo(Cagnotte::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
