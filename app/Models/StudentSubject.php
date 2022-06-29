<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSubject extends Model
{
    use HasFactory;
//    protected $fillable =[
//      'class_id',
//      'subject_name',
//      'subject_code',
//    ];

    protected $guarded = [];

    public function studentClass()
    {
        return $this->belongsTo(StudentClass::class,'class_id','id');
    }
}
