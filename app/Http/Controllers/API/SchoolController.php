<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\School;

class SchoolController extends Controller
{
    public function index(){
        return School::latest()->paginate(10);
    }

    public function list(){
        return School::latest()->paginate(10);
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'school_code' => 'required|string|max:191'
        ]);

        return School::create([
            'name' => $request->get('name'),
            'school_code' => $request->get('school_code')
        ]);
    }

    public function update(Request $request, $id){
        $school = School::findOrFail($id);
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'school_code' => 'required|string|max:191'
        ]);

        $school->update($request->all());

    }

    public function destroy(Request $request,$id){
        $school = School::findOrFail($id);
        $school->delete();
    }
}
