<?php
// app/Http/Controllers/DepartmentController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function show($id)
    {
        $department = Department::find($id);

        if (!$department) {
            return redirect()->back();
        }

        else return view('department', ['department' => $department]);
    }

    public function destroy($id)
    {
        $department = Department::find($id);
        $department->delete();
        return redirect()->back();
    }

    public function store()
    {
        $department = new Department();
        $department->department_name = request('department_name');
        $department->description = request('description');
        $department->save();
        return redirect()->back();
    }
}