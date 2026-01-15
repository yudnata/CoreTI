<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart'; // Singular table name as per migration

    protected $fillable = [
        'user_id',
        'name',
        'price',
        'quantity',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
