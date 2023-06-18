<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublishProperty extends Model
{
    use HasFactory;
    protected $fillable = [
        'publish_code',
        'property_type',
        'location',
        'city',
        'title',
        'description',
        'price',
        'transaction_type',
        'bedrooms',
        'bathrooms',
        'total_area',
         'garage',
          'energy_certificate',
         'additional_features',
        
        'publication_date',
        'status',
        'user_id',
    ];

     public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function propertyImages()
    {
        return $this->hasMany(PropertyImage::class);
    }

    public function myplans()
    {
        return $this->hasMany(MyPlan::class);
    }

     public function features()
    {
        return $this->hasMany(Feature::class);
    }

    public function equipment()
    {
        return $this->hasMany(Equipment::class);
    }
     public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}
