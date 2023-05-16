<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bucket extends Model
{
    use HasFactory;
     protected $fillable = [
        'description', 
         'country',
          'community',
          'city',
           'address',
            'user_id',
    ];

     public function users()
    {
        return $this->belongsTo(User::class);
    }

}
