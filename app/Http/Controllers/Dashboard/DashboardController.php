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

    public function chat()
    {
        return view('dashboard.pages.chat.chat');
    }

    public function calender()
    {
        return view('dashboard.pages.calender.calender');
    }

    public function file()
    {
        return view('dashboard.pages.file.file');
    }

    public function contact()
    {
        return view('dashboard.pages.contact.contact');
    }
    
}
