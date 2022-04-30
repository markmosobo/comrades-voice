<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Candidate;

class CastedVote extends Model
{
    use HasFactory;
    protected $fillable = [
        'reg_no',
        'president_candidate_id',
        'sec_gen_candidate_id',
        'finance_candidate_id',
        'school_male_rep_id',
        'school_female_rep_id',
        'sports_male_candidate_id',
        'sports_female_candidate_id'
    ];

    public function president()
    {
        return $this->belongsTo(Candidate::class,'president_candidate_id');
    }

    public function secgen()
    {
        return $this->belongsTo(Candidate::class,'sec_gen_candidate_id');
    }

    public function finance()
    {
        return $this->belongsTo(Candidate::class,'finance_candidate_id');
    }

    public function school_male()
    {
        return $this->belongsTo(Candidate::class,'school_male_candidate_id');
    }

    public function school_female()
    {
        return $this->belongsTo(Candidate::class,'school_female_candidate_id');
    }

    public function sports_male()
    {
        return $this->belongsTo(Candidate::class,'sports_male_candidate_id');
    }

    public function sports_female()
    {
        return $this->belongsTo(Candidate::class,'sports_female_candidate_id');
    }
}
