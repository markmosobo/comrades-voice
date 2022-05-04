<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AcadYear;

class ElectionDate extends Model
{
    use HasFactory;
    protected $fillable = [
        'acad_year_id',
        'start_date',
        'start_time',
        'end_time',
        'end_date'
    ];

    public function year()
    {
        return $this->belongsTo(AcadYear::class,'acad_year_id');
    }
}
