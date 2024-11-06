<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\Department;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->save();
        return redirect()->back();
    }

    public function promote($id)
    {
        $employee = Employee::find($id);
        $employee->admin = true;
        $employee->save();
        return redirect()->back();
    }

    public function setDepartment($id, $departmentId)
    {
        $employee = Employee::find($id);
        $department = Department::find($departmentId);
        if (!$department) {
            return redirect()->back();
        }
    
        $employee->department_id = $departmentId;
        $employee->save();
        return redirect()->back();
    }
}
