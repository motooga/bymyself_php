<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Family extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
<<<<<<< HEAD
    public function users() { 
        return $this->hasMany(User::class);
=======
    
    public function family() {
        return $this->belongsTo(Family::class);
>>>>>>> main
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
<<<<<<< HEAD
        'family_name',
        'email',
        'password',
=======
<<<<<<<< HEAD:app/Models/User.php
        'login_id',
        'nickname',
========
        'family_name',
        'email',
>>>>>>>> main:app/Models/Family.php
        'password',
        'family_id'
>>>>>>> main
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
<<<<<<< HEAD

    
=======
>>>>>>> main
}
