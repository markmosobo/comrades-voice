<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ElectionDate;

class ElectionDateController extends Controller
{
    public function index()
    {
        return ElectionDate::latest()->with('year')->paginate(10);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'acad_year_id' => 'integer|required',
            'start_date' => 'required|date',
            'start_time' => 'required|time',
            'end_date' => 'required|date',
            'end_time' => 'required|time'
        ]);

        return ElectionDate::create([
            'acad_year_id' => $request->get('acad_year_id'),
            'start_date' => $request->get('start_date'),
            'start_time' => $request->get('start_time'),
            'end_date' => $request->get('end_date'),
            'end_time' => $request->get('end_time'),
        ]);
    }

    public function update(Request $request,$id)
    {
        $electiondate = ElectionDate::findOrFail($id);
        $this->validate($request,[
            'acad_year_id' => 'integer|required',
            'start_date' => 'required|date',
            'start_time' => 'required|time',
            'end_date' => 'required|date',
            'end_time' => 'required|time'
        ]);

        $electiondate->update($request->all());
    }

    public function destroy(Request $request,$id)
    {
        $electiondate = ElectionDate::findOrFail($id);
        $electiondate->delete();
    }
}
