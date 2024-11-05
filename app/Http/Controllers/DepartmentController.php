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
            return redirect()->route('homeAuth');
        }

        return view('department', ['department' => $department]);
    }
}