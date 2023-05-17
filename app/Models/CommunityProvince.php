<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityProvince extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
         'province_id', 
         
    ];

     public function provinces()
    {
        return $this->belongsTo(Province::class);
    }
}
