<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Candidate;

class FinanceVote extends Model
{
    use HasFactory;
    protected $fillable = [
        'candidate_id',
        'value'
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }    
}
