<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lastname',
         'dni',
         'phone',
        'email',
        'password',
        'address',
        'city',
        'province',
        'zipcode',
        'social_id',
        'social_type'
         
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    
    public function plans()
    {
        return $this->hasMany(Plan::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

     public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function contactform()
    {
        return $this->hasMany(ContactForm::class);
    }
     public function adminemail()
    {
        return $this->hasMany(AdminEmail::class);
    }

    public function bucket()
    {
        return $this->hasMany(Bucket::class);
    }
     public function country()
    {
        return $this->hasMany(Country::class);
    }

    public function estatusads()
    {
        return $this->hasMany(EstatusAds::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
