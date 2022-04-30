<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\School;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'reg_no',
        'school_id'
    ];

    public function school()
    {
        return $this->belongsTo(School::class,'school_id');
    }
}
