<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentApiController extends Controller
{
    public function addDepartment(Request $req)
    {
        $dep = new Department();
        $dep->name = $req->name;
        if($dep->save())
        {
            return response()->json(['msg' => 'department created']);
        }
        return response()->json(['msg' => 'failed to create department']);
    }

    public function getDepartment(Request $req)
    {
        $dep = Department::where('id', $req->id)->first();
        return response()->json($dep);
    }

    public function getAllDepartment()
    {
        $dep = Department::all();
        return response()->json($dep);
    }

    public function editDepartment(Request $req)
    {
        $dep = Department::where('id', $req->id)->first();
        $dep->name = $req->name;
        if($dep->save())
        {
            return response()->json(['msg' => 'department edited']);
        }
        return response()->json(['msg' => 'failed to edit department']);
    }

    public function deleteDepartment(Request $req)
    {
        if(Department::where('id', $req->id)->delete())
        {
            return response()->json(['msg' => 'department deleted']);
        }
        return response()->json(['msg' => 'failed to delete department']);
    }
}
