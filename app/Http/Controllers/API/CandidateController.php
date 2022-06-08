<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidate;

class CandidateController extends Controller
{
    public function index(){
        return Candidate::latest()->with('student','position','school','year')->paginate(10);
    }

    public function find(Request $request){

        return Candidate::where([
            [function ($query) use ($request){
                if (($position_id = $request->candidate_position_id) &&
                ($gender = $request->gender)
                ($acad_year_id = $request->acad_year_id) ){               
                $query->orWhere('position_id','LIKE','%'.$position_id.'%')->get();
                $query->orWhere('gender','LIKE','%'.$gender.'%')->get();
                $query->orWhere('acad_year_id','LIKE','%'.$acad_year_id.'%')->get();
                }
            }]
        ])->orderBy('id','desc')->paginate(10); 
    }

    public function store(Request $request){
        $this->validate($request,[
            'student_id' => 'required|integer|max:191',
            'position_id' => 'required|integer|max:191',
            // 'school_id' => 'required|integer|max:191',
            'gender' => 'required|string'
        ]);

        return Candidate::create([
            'student_id' => $request->get('student_id'),
            'position_id' => $request->get('position_id'),
            // 'school_id' => $request->get('school_id'),
            'gender' => $request->get('gender')
        ]);
    }

    public function update(Request $request, $id){
        $candidate = Candidate::findOrFail($id);
        $this->validate($request,[
            'student_id' => 'required|integer|max:191',
            'position_id' => 'required|integer|max:191',
            // 'school_id' => 'required|integer|max:191',
            'gender' => 'required|string'
        ]);

        $candidate->update($request->all());

    }

    public function destroy(Request $request,$id){
        $candidate = Candidate::findOrFail($id);
        $candidate->delete();
    }

    public function pres()
    {
        return Candidate::latest()->where('position_id','=','1')->with('student','position','school','year')->paginate(10);
    }

    public function sec_gen()
    {
        return Candidate::latest()->where('position_id','=','3')->with('student','position','school','year')->paginate(10);
    }

    public function fin()
    {
        return Candidate::latest()->where('position_id','=','4')->with('student','position','school','year')->paginate(10);
    }

    public function male_sch()
    {
        return Candidate::latest()->where('position_id','=','2')
        ->where('gender','=','M')->with('student','position','school','year')->paginate(10);
    }

    public function female_sch()
    {
        return Candidate::latest()->where('position_id','=','2')
        ->where('gender','=','F')->with('student','position','school','year')->paginate(10);
    }

    public function male_sport()
    {
        return Candidate::latest()->where('position_id','=','5')
        ->where('gender','=','M')->with('student','position','school','year')->paginate(10);
    }

    public function female_sport()
    {
        return Candidate::latest()->where('position_id','=','5')->where('gender','=','F')
        ->with('student','position','school','year')->paginate(10);
    }

    public function lead()
    {
        return Candidate::orderBy('votes','desc')->where('votes','>',0)
        ->with('year','student','position','school')->paginate(10);
    }

    public function countPres()
    {
        $candidates = Candidate::latest()->where('position_id','=','1')->count();
        return response()->json($candidates);
    }

    public function countSec_gen()
    {
        $candidates = Candidate::latest()->where('position_id','=','3')->count();
        return response()->json($candidates);    }

    public function countFin()
    {
        $candidates = Candidate::latest()->where('position_id','=','4')->count();
        return response()->json($candidates);    }

    public function countMale_sch()
    {
        $candidates = Candidate::latest()->where('position_id','=','2')
        ->where('gender','=','M')->count();
        return response()->json($candidates);
    }

    public function countFemale_sch()
    {
        $candidates = Candidate::latest()->where('position_id','=','2')
        ->where('gender','=','F')->count();
        return response()->json($candidates);
    }

    public function countMale_sport()
    {
        $candidates = Candidate::latest()->where('position_id','=','5')
        ->where('gender','=','M')->count();
        return response()->json($candidates);
    }

    public function countFemale_sport()
    {
        $candidates = Candidate::latest()->where('position_id','=','5')
        ->where('gender','=','F')->count();
        return response()->json($candidates);
    }
    
    public function countCand()
    {
        $candidates = Candidate::all()->count();
        return response()->json($candidates);
    }
    
}
