<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
   protected $fillable = [
        'plan', 
        'pricing', 
        'position',
        'duration',
         'user_id'
    ];   
    
     public function users()
    {
        return $this->belongsTo(User::class);
    }
}
