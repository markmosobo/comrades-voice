<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
*/
Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function(){
  Route::get('/user', function( Request $request ){
    return $request->user();
  });
});

Route::apiResources([
    'school' => API\SchoolController::class,
    'position' => API\PositionController::class,
    'candidate' => API\CandidateController::class,
    'vote' => API\CastedVoteController::class,
]);

Route::get('listschools',[API\SchoolController::class,'list']);
Route::get('listpositions',[API\PositionController::class,'list']);
Route::get('liststudents',[API\StudentController::class,'list']);
Route::get('confirmreg',[API\StudentController::class,'confirm']);
Route::get('pres_candidate',[API\CandidateController::class,'pres']);
Route::get('sec_gen_candidate',[API\CandidateController::class,'sec_gen']);
Route::get('fin_candidate',[API\CandidateController::class,'fin']);
Route::get('male_sch_candidate',[API\CandidateController::class,'male_sch']);
Route::get('female_sch_candidate',[API\CandidateController::class,'female_sch']);
Route::get('male_sport_candidate',[API\CandidateController::class,'male_sport']);
Route::get('female_sport_candidate',[API\CandidateController::class,'female_sport']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
