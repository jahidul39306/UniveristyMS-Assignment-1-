<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentApiController extends Controller
{
    public function addStudent(Request $req)
    {
        $st = new Student();
        $st->name = $req->name;
        $st->fk_departments_id = $req->fk_departments_id;
        if($st->save())
        {
            return response()->json(['msg' => 'student created']);
        }
        return response()->json(['msg' => 'failed to create student']);
    }

    public function getStudent(Request $req)
    {
        $st = Student::where('id', $req->id)->first();
        return response()->json($st);
    }

    public function getAllStudent()
    {
        $st = Student::get();
        return response()->json($st);
    }

    public function editStudent(Request $req)
    {
        $st = Student::where('id', $req->id)->first();
        $st->name = $req->name;
        $st->fk_departments_id = $req->fk_departments_id;
        if($st->save())
        {
            return response()->json(['msg' => 'student edited']);
        }
        return response()->json(['msg' => 'failed to edit student']);
    }

    public function deleteStudent(Request $req)
    {
        if(Student::where('id', $req->id)->delete())
        {
            return response()->json(['msg' => 'student deleted']);
        }
        return response()->json(['msg' => 'failed to delete student']);
    }
}
