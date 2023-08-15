<?php

namespace App\Models;
use App\Models\Assignment;
use App\Models\Submission;
use App\Models\plagiarism;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password', 'qualification', 'dob', 'phone_number', 'file','role','roll_no'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }
     public function submissions()
    {
        return $this->hasMany(Submission::class);
    }
       public function plagiarisms()
    {
        return $this->hasMany(plagiarism::class);
    }
}
