<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StudentSubject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function GetSubjects()
    {
        $all_subjects = StudentSubject::latest()->get();
        return response()->json($all_subjects);
     }

    public function InsertSubjects(Request $request)
    {
        $request -> validate([
           'class_id'=>'required',
           'subject_name'=>'required|unique:student_subjects',
           'subject_code'=>'required|unique:student_subjects',
        ]);

        StudentSubject::insert([
           'class_id'=>$request->class_id,
           'subject_name'=>$request->subject_name,
           'subject_code'=>$request->subject_code,
        ]);
        return response('Data successfully inserted');
     }

    public function EditSubject($id)
    {
        $selected_data = StudentSubject::findOrFail($id);
        return response()->json($selected_data);
     }

    public function UpdateSubject(Request $request,$id)
    {
        $selected_data= StudentSubject::findOrFail($id);
        $selected_data->update([
            'class_id'=>$request->class_id,
            'subject_name'=>$request->subject_name,
            'subject_code'=>$request->subject_code,
        ]);
        return response('Data successfully updated');
     }

    public function DeleteSubject($id)
    {
        StudentSubject::findOrFail($id)->delete();
        return response('Data successfully Deleted');
     }
}
