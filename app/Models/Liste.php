<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Liste extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'uuid',
        'stripe_account_id',
        'identity_verified',
        'description',
        'dateBirth',
        'partner',
        'cagnotte_id',
        'user_id',
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'dateBirth' => 'datetime',
    ];

    /**
     * Get the user that owns the Liste
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'liste_product')
                    ->withPivot('title', 'brand', 'price', 'size', 'img', 'link','reserved');
    }

    public function cagnotte(): HasOne
    {
        return $this->hasOne(Cagnotte::class);
    }

    public function updateListe(array $data)
    {
        $this->validate($data);
        $this->update($data);
    }
}
