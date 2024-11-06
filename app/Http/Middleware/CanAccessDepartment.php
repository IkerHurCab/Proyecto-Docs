<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Department;

class CanAccessDepartment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle(Request $request, Closure $next)
    {
        $departmentId = $request->route('id');
        $user = Auth::user();

        if ($user->admin || $user->department_id == $departmentId) {
            return $next($request);
        }

        return redirect('/home')->with('error', 'No tienes permiso para acceder a este departamento.');
    }
}