<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function GetStudents()
    {
        $selected_data = Student::latest()->get();
        return response()->json($selected_data);
    }

    public function InsertStore(Request $request)
    {
        $request -> validate([
            'email'=>'required|unique:students',
            'mobile'=>'required|unique:students'
        ]);
        Student::insert([
            'class_id' =>$request->class_id,
            'section_id' =>$request->section_id,
            'name' =>$request->name,
            'email' =>$request->email,
            'gender' =>$request->gender,
            'address' =>$request->address,
            'mobile' =>$request->mobile,
            'image' =>$request->image,
            'password' =>Hash::make($request->password),
            'created_at' =>Carbon::now(),
        ]);
        return response('Data inserted successfully');
    }

    public function EditStudent($id)
    {
        $selected_data= Student::findOrFail($id);
        return response()->json($selected_data);
    }

    public function UpdateStudent(Request $request,$id)
    {
        Student::findOrFail($id)->update([
            'class_id' =>$request->class_id,
            'section_id' =>$request->section_id,
            'name' =>$request->name,
            'email' =>$request->email,
            'gender' =>$request->gender,
            'address' =>$request->address,
            'mobile' =>$request->mobile,
            'image' =>$request->image,
            'password' =>Hash::make($request->password),
            'created_at' =>Carbon::now(),
        ]);
        return response('Data updated successfully');

    }

    public function DeleteStudent($id)
    {
        Student::findOrFail($id)->delete();
        return response('Data updated successfully');
    }

}
