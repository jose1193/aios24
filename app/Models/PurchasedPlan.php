<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasedPlan extends Model
{
    use HasFactory;
    protected $fillable = [
        'property_id',
        'publish_code',
        'user_id',
        'plan_id',
        'purchase_date',
        'expiration_date',
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
