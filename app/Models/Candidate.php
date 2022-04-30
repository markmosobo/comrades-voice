<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Position;
use App\Models\Student;
use App\Models\School;

class Candidate extends Model
{
    use HasFactory;
    protected $fillable = [
        'position_id',
        'student_id',
        'gender',
        'school_id'
    ];
    //candidate belongs to a position
    public function position()
    {
        return $this->belongsTo(Position::class,'position_id');
    }

    //candidacy belongs to a student
    public function student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }
    //candidacy belongs to a school
    public function school()
    {
        return $this->belongsTo(School::class,'school_id');
    }
}
