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
        $searchedreg = Student::where([
            [function ($query) use ($request){
                if (($search = $request->search)){
                    $query->orWhere('reg_no','LIKE','%'.$search.'%')->get();
                }

            }]
        ])
        ->orderBy('id','desc')
        ->paginate(10);  
        if(count($searchedreg) == 0){
            return redirect('/')->with('status','This registration number is not in our records');
        }
         else{    
        return view('vote',compact('searchedreg'))
        ->with('i',(request()->input('page',1)- 1)* 5);
        }
    }    
}
