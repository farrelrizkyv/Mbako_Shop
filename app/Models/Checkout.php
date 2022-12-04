<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    
    public function user()
    {
        return $this->belongTo(User::class, 'user_id');
    }
}