<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PremiumPlan extends Model
{
    use HasFactory;
     protected $fillable = [
        
        'user_id',
        'plan_id',
        'purchase_date',
        'expiration_date',
        'estatus_premium',
    ];

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con el modelo Plan
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
