<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function list()
    {
        return Student::latest()->paginate(10);
    }

    public function confirm(Request $request)
    {
        $this->validate($request,[
            'reg_no'=> 'required|string|max:250'
        ]);
        $validregno = Student::where([
            [function($query) use ($request){
                if(($regno = $request->regno)){
                    $query->orWhere('reg_no','LIKE','%'.$regno.'%')->get();
                }
            }]
        ])->paginate(1);
        return view('welcome',compact('validregno'))
        ->with('i',(request()->input('page',1)- 1)* 5);

    }

    public function countStud()
    {
        $students = Student::all()->count();
        return response()->json($students);
    }

    public function update(Request $request,$id)
    {
        $student = Student::findOrFail($id);
        if($student){
            $student->update(array('vote_status' => '1'));
            $student->save();
        }
    }
}
