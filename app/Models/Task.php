<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['task', 'deadline', 'user_id'];

    public function user()
    {
        //belongsTo (pertence a)
        return $this->belongsTo(User::class);
    }
}
