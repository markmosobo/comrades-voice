<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class PresidentialVote extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'value'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
