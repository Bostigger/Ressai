<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    public function GetClasses()
    {
        $all_classes = StudentClass::latest()->get();
        return response()->json($all_classes);
    }

    public function InsertClass(Request $request)
    {
        $request->validate([
           'class_name' => 'required|unique:student_classes|max:255'
        ]);
        StudentClass::insert([
           'class_name'=>$request->class_name,
        ]);
        return response("Class Data Successfully Inserted");
    }

    public function EditClass($id)
    {
        $selected_class = StudentClass::findOrFail($id);
        return response()->json($selected_class);
    }

    public function UpdateClass(Request $request,$id)
    {
        $request->validate([
            'class_name' => 'required|unique:student_classes|max:255'
        ]);
        $selected_class = StudentClass::findOrFail($id);
        $selected_class->update([
            'class_name'=>$request->class_name
        ]);
        return response("Data successfully Update");
    }

    public function DeleteClass($id)
    {
        $selected_data = StudentClass::findOrFail($id);
        $selected_data->delete();
        return response('Data successfully Delete');
    }
}
