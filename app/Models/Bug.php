<?php

namespace App\Models;
use App\Models\Submission;
use App\Models\Assignment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bug extends Model
{
    use HasFactory;
    protected $guarded = [];
      public function submission()
    {
        return $this->belongsTo(Submission::class);
    }
      public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }
}
