<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $fillable = [
        'property_description', 
         'user_id'
    ];

     public function users()
    {
        return $this->belongsTo(User::class);
    }
}
