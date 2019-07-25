<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
   
    public function index() {
        
        $mail = Mail::all();
        return response()->json($mail);
    }

    
    public function store(Request $request) {
        //
    }

    
    public function update(Request $request, $id) {
        //
    }

    
    public function destroy($id) {
        //
    }
}
