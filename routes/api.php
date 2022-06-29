<?php


use App\Http\Controllers\Api\SectionController;
use App\Http\Controllers\Api\StudentClassController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\SubjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

//Student route
Route::get('/class',[StudentClassController::class,'GetClasses']);
Route::post('/class/insert',[StudentClassController::class,'InsertClass']);
Route::get('/class/edit/{id}',[StudentClassController::class,'EditClass']);
Route::post('/class/update/{id}',[StudentClassController::class,'UpdateClass']);
Route::get('/class/delete/{id}',[StudentClassController::class,'DeleteClass']);

//Subject route
Route::get('/subject',[SubjectController::class,'GetSubjects']);
Route::post('/subject/insert',[SubjectController::class,'InsertSubjects']);
Route::get('/subject/edit/{id}',[SubjectController::class,'EditSubject']);
Route::post('/subject/update/{id}',[SubjectController::class,'UpdateSubject']);
Route::get('/subject/delete/{id}',[SubjectController::class,'DeleteSubject']);

//Section Route
Route::get('/sections',[SectionController::class,'GetSections']);
Route::post('/sections/insert',[SectionController::class,'InsertSections']);
Route::get('/sections/edit/{id}',[SectionController::class,'EditSection']);
Route::post('/sections/update/{id}',[SectionController::class,'UpdateSection']);
Route::get('/sections/delete/{id}',[SectionController::class,'DeleteSection']);


//Student Route
Route::get('/students',[StudentController::class,'GetStudents']);
Route::post('/students/insert',[StudentController::class,'InsertStore']);
Route::get('/students/edit/{id}',[StudentController::class,'EditStudent']);
Route::post('/students/update/{id}',[StudentController::class,'UpdateStudent']);
Route::get('/students/delete/{id}',[StudentController::class,'DeleteStudent']);


