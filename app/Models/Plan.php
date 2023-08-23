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
        'number_publications',
        'pricing', 
        'position',
        'duration',
        'quantity',
        'images_quantity',
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

     public function purchasedplan()
    {
        return $this->hasMany(PurchasedPlan::class);
    }

     public function premiumplan()
    {
        return $this->hasMany(PremiumPlan::class);
    }

     public function renewalplan()
    {
        return $this->hasMany(RenewalPlans::class);
    }
}
