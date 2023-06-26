<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyPlan extends Model
{
    use HasFactory;
protected $fillable = [
    'property_id',
        'publish_code',
           'plan_id',
            'myplan_status',
        'date_myplan',
        'expiration_date',
        
    ];
    public function publishProperty()
    {
        return $this->belongsTo(PublishProperty::class);
    }
    public function plans()
    {
        return $this->belongsTo(Plans::class);
    }
}
