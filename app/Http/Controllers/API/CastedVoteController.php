<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CastedVote;

class CastedVoteController extends Controller
{
    public function index()
    {
        return CastedVote::latest()->paginate(5);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'pres_candidate_id' => 'required|integer',
            'sec_gen_candidate_id' => 'required|integer',
            'fin_candidate_id' => 'required|integer',
            'male_sch_candidate_id' => 'required|integer',
            'female_sch_candidate_id' => 'required|integer',
            'male_sport_candidate_id' => 'required|integer',
            'female_sport_candidate_id' => 'required|integer',            
        ]);

        $castedvote = CastedVote::create([
            'pres_candidate_id' => $request->get('pres_candidate_id'),
            'sec_gen_candidate_id' => $request->get('sec_gen_candidate_id'),
            'fin_candidate_id' => $request->get('fin_candidate_id'),
            'male_sch_candidate_id' => $request->get('male_sch_candidate_id'),
            'female_sch_candidate_id' => $request->get('female_sch_candidate_id'),
            'male_sport_candidate_id' => $request->get('male_sport_candidate_id'),
            'female_sport_candidate_id' => $request->get('female_sport_candidate_id'),
        ]);
        $castedvote->save($request->all());
    }
}
