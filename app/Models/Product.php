<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class, 'product_permissions', 'user_id', 'product_id');
    }
}
