<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Candidate;

class CastedVote extends Model
{
    use HasFactory;
    protected $fillable = [
        'pres_candidate_id',
        'sec_gen_candidate_id',
        'fin_candidate_id',
        'male_sch_candidate_id',
        'female_sch_candidate_id',
        'male_sport_candidate_id',
        'female_sport_candidate_id'
    ];

    public function president()
    {
        return $this->belongsTo(Candidate::class,'pres_candidate_id');
    }

    public function secgen()
    {
        return $this->belongsTo(Candidate::class,'sec_gen_candidate_id');
    }

    public function finance()
    {
        return $this->belongsTo(Candidate::class,'fin_candidate_id');
    }

    public function school_male()
    {
        return $this->belongsTo(Candidate::class,'male_sch_candidate_id');
    }

    public function school_female()
    {
        return $this->belongsTo(Candidate::class,'female_sch_candidate_id');
    }

    public function sports_male()
    {
        return $this->belongsTo(Candidate::class,'male_sport_candidate_id');
    }

    public function sports_female()
    {
        return $this->belongsTo(Candidate::class,'female_sport_candidate_id');
    }
}
