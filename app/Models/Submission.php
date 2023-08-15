<?php

namespace App\Models;
use App\Models\Assignment;
use App\Models\plagiarism;
use App\Models\User;
use App\Models\Bug;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;
    protected $guarded = [];
      public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }
      public function user()
    {
        return $this->belongsTo(User::class);
    }
      public function plagiarisms()
    {
        return $this->hasMany(plagiarism::class);
    }
     public function Bug()
    {
        return $this->hasOne(Bug::class);
    }
}
