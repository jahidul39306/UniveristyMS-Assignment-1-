<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Department;

class DepartmentStudentApiController extends Controller
{
    public function studentDetails(Request $req)
    {
        $dep = Department::where('id', $req->id)->first();
        $details = [
            'id' => $dep->id,
            'name' => $dep->name,
            'students' => $dep->student
        ];
        return response()->json($details);
    }
}
