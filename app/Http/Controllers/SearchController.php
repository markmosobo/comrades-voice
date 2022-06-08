<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;

class SearchController extends Controller
{
    public function search(Request $request){
        $rules = [
            'search' => 'required|string|min:18|max:25'
        ];
        
       $validator = Validator::make($request->all(),$rules);
       if ($validator->fails()){
           return redirect('/')
               ->withInput()
               ->withErrors($validator);
       } 
        if(Student::where('reg_no', $request->search)->exists()){
            return view('vote')
            ->with('i',(request()->input('page',1)- 1)* 5);
        }
         else{    
            return redirect('/')->with('status','This registration number is not in our records');
        }
    }    
}
