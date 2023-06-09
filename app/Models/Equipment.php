<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;
    protected $fillable = [
        'equipment_description', 
         'publish_property_id',
        
    ];   
     public function publishproperties()
    {
        return $this->belongsTo(PublishProperty::class);
    }
}
