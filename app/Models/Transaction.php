<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
protected $fillable = [
        'transaction_description', 
         'user_id'
    ];

     public function users()
    {
        return $this->belongsTo(User::class);
    }
}
