<?php

namespace App\Http\Controllers\Admin\Mailbox;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use BeyondCode\Mailbox\Facades\Mailbox;

class MailboxController extends Controller
{
    
    public function index() {

        $mail = Mailbox::catchAll(CatchAllMailbox::class);
      

        return view('admin.pages.mailbox.mailbox',compact('mail'));
    }

    
    public function create() {
        //
    }

    
    public function store(Request $request) {
        //
    }

    
    public function show($id) {
        //
    }

    
    public function edit($id) {
        //
    }

    
    public function update(Request $request, $id) {
        //
    }

   
    public function destroy($id) {
        //
    }
}
