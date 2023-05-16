<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    use HasFactory;
     protected $fillable = [
        'name', 
        'email', 
        'subject', 
        'message', 
        'phone', 
          'read', 
         'user_id'
    ];

     public function users()
    {
        return $this->belongsTo(User::class);
    }
}
