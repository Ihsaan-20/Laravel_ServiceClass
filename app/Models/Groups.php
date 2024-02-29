<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    use HasFactory;

    public function users() {
        return $this->belongsToMany(User::class, 'group_user', 'group_id', 'user_id');
    }

    public function messages() {
        return $this->hasMany(Message::class);
    }
}
