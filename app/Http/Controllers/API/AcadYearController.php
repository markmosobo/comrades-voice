<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AcadYear;

class AcadYearController extends Controller
{
    public function index(){
        return AcadYear::latest()->paginate(10);
    }

    public function list(){
        return AcadYear::latest()->paginate(10);
    }

    public function store(Request $request){
        $this->validate($request,[
            'year_code' => 'required|string|max:191'
        ]);

        return AcadYear::create([
            'year_code' => $request->get('year_code')
        ]);
    }

    public function update(Request $request, $id){
        $acad_year = AcadYear::findOrFail($id);
        $this->validate($request,[
            'year_code' => 'required|string|max:191'
        ]);

        $acad_year->update($request->all());

    }

    public function destroy(Request $request,$id){
        $acad_year = AcadYear::findOrFail($id);
        $acad_year->delete();
    }    
}
