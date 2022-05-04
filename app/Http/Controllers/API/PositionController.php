<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Position;

class PositionController extends Controller
{
    public function index(){
        return Position::latest()->paginate(10);
    }

    public function list(){
        return Position::latest()->paginate(10);
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'position_code' => 'required|string|max:191'
        ]);

        return Position::create([
            'name' => $request->get('name'),
            'position_code' => $request->get('position_code')
        ]);
    }

    public function update(Request $request, $id){
        $position = Position::findOrFail($id);
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'position_code' => 'required|string|max:191'
        ]);

        $position->update($request->all());

    }

    public function destroy(Request $request,$id){
        $position = Position::findOrFail($id);
        $position->delete();
    }

    public function countPos()
    {
        $positions = Position::all()->count();
        return response()->json($positions);
    }
}
