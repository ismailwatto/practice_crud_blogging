<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function getUserNameAttribute()
{
    return $this->user->name; // Assuming the user's name is stored in the 'name' column of the 'users' table
}
}
