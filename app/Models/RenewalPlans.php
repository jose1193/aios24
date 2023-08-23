<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RenewalPlans extends Model
{
    use HasFactory;
     protected $fillable = [
        
        'user_id',
        'plan_id',
        'purchase_date',
        'nro_invoices',
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
