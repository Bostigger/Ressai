<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function GetSections()
    {
        $all_sections = Section::latest()->get();
        return response()->json($all_sections);
    }

    public function InsertSections(Request $request)
    {
        $request->validate([
           'class_id'=>'required',
           'section_name'=>'required|unique:sections',
        ]);
        Section::insert([
           'class_id'=>$request->class_id,
           'section_name'=>$request->section_name,
            'created_at'=>Carbon::now()
        ]);
        return response('Data inserted successfully');
    }

    public function EditSection($id)
    {
        $selected_data = Section::findOrFail($id);
        return response()->json($selected_data);
    }

    public function UpdateSection(Request $request,$id)
    {
        $selected_data = Section::findOrFail($id);
        $selected_data->update([
           'class_id'=>$request->class_id,
           'section_name'=>$request->section_name,
        ]);
        return response('Data Update successfully');
    }

    public function DeleteSection($id)
    {
        Section::findOrFail($id)->delete();
        return response('Data Update successfully');
    }


}
