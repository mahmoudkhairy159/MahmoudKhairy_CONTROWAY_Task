<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Product extends Model
{
    protected $fillable = [
        'name', 'type', 'quantity', 'user_id',
    ];

    //Relationships
    //user-->product 1to*
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
