<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;


class Liste extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'dateBirth',
        'patner',
        'cagnotte_id',
        'user_id',
    ];

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
