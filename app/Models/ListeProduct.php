<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ListeProduct extends Pivot
{
    protected $table = 'liste_product'; // Nom de votre table de pivot

    protected $fillable = ['title', 'brand', 'price', 'size', 'img', 'link','product_id', 'liste_id', 'reserved'];
}
