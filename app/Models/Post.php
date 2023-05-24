<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
 protected $fillable = [
        'post_title', 'post_content','post_image','post_status','post_date','user_id','category_id',
        'meta_description','meta_title','meta_keywords','post_title_slug'
    ];
      public function users()
    {
        return $this->belongsTo(User::class);
    }
     public function categories()
    {
        return $this->belongsTo(Category::class);
    }
}
