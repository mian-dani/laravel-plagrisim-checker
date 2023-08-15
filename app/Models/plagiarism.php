<?php
namespace App\Models;
use App\Models\Submission;
use App\Models\User;
use App\Models\Assignment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class plagiarism extends Model
{
    use HasFactory;
    protected $guarded = [];
     public function submission()
    {
        return $this->belongsTo(Submission::class);
    }
       public function user()
    {
        return $this->belongsTo(User::class);
    }
       public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }
}
