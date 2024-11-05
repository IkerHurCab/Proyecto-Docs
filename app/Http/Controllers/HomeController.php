<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Department;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
}