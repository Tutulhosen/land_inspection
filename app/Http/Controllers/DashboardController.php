<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //show dashboard index page
    public function index()
    {
        return view('dashboard.index');
    }
}
