<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function home()
    {
        return view('dashboard.pages.home.home');
    }

     public function mail()
    {
        return view('dashboard.pages.mail.mail');
    }
    
}
