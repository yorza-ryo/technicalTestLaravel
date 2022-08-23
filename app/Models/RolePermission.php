<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    use HasFactory;

    public function Users()
    {
        return $this->belongsToMany(User::class, 'role_permissions', 'user_id', 'role_id');
    }
}
