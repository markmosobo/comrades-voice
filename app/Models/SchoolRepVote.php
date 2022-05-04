<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Candidate;

class SchoolRepVote extends Model
{
    use HasFactory;
    protected $fillable = [
        'candidate_id',
        'value',
        'gender'
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }    
}
