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
        'title',
        'description',
        'price',
        'transaction_type',
        'bedrooms',
        'bathrooms',
        'total_area',
        'additional_features',
        'images',
        'publication_date',
        'status',
        'user_id',
    ];

     public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function propertyimages()
    {
        return $this->hasMany(PropertyImage::class);
    }
}
