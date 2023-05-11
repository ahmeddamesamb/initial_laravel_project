<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',
        'prix',
        'quantity',
        'idUser'
    ];
    public function unregister_tick_function():BelongsTo
    {
        return $this->belongsTo(User::class);  
    }
}
