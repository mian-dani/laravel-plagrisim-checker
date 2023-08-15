<?php

namespace App\Models;

use App\Models\User;
use App\Models\Submission;
use App\Models\plagiarism;
use App\Models\Bug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $fillable = ['name'];
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
     public function submissions()
    {
        return $this->hasMany(Submission::class);
    }
      public function plagiarisms()
    {
        return $this->hasMany(plagiarism::class);
    }
       public function bug()
    {
        return $this->hasOne(Bug::class);
    }
}
