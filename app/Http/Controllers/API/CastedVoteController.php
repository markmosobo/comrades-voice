<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CastedVote;
use App\Models\Candidate;

class CastedVoteController extends Controller
{
    public function index()
    {
        return CastedVote::latest()->paginate(10);
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
        //correlate to candidates table for increment
        $prescandidateid = $request->get('pres_candidate_id');
        $presidentialcandidate = Candidate::where('id', $prescandidateid);
        $presidentialcandidate->increment('votes');
        $secgencandidateid = $request->get('sec_gen_candidate_id');
        $secgencandidate = Candidate::where('id', $secgencandidateid);
        $secgencandidate->increment('votes');
        $fincandidateid = $request->get('fin_candidate_id');
        $fincandidate = Candidate::where('id', $fincandidateid);
        $fincandidate->increment('votes');
        $maleschcandidateid = $request->get('male_sch_candidate_id');
        $maleschcandidate = Candidate::where('id', $maleschcandidateid);
        $maleschcandidate->increment('votes');
        $femaleschcandidateid = $request->get('female_sch_candidate_id');
        $femaleschcandidate = Candidate::where('id', $femaleschcandidateid);
        $femaleschcandidate->increment('votes');
        $malesportcandidateid = $request->get('male_sport_candidate_id');
        $malesportcandidate = Candidate::where('id', $malesportcandidateid);
        $malesportcandidate->increment('votes');
        $femalesportcandidateid = $request->get('female_sport_candidate_id');
        $femalesportcandidate = Candidate::where('id', $femalesportcandidateid);
        $femalesportcandidate->increment('votes');
    }

    public function countVote()
    {
        $votes = CastedVote::all()->count();
        return response()->json($votes);
    }
}