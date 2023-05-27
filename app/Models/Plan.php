<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
   protected $fillable = [
        'plan', 
        'plan_description',
        'pricing', 
        'position',
        'duration',
        'quantity',
         'user_id'
    ];   
    
     public function users()
    {
        return $this->belongsTo(User::class);
    }

     public function myplans()
    {
        return $this->hasMany(MyPlan::class);
    }
}
