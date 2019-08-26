<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MailResource;
use App\Jobs\MailAttachmentDownload;
use App\Models\Mail;

class MailController extends Controller
{

    public function index()
    {
      $mail = Mail::all();
      return MailResource::collection($mail);
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Mail $mail)
    {
        return $id;
    }


    public function update(Request $request, Mail $mail)
    {
        //
    }


    public function destroy(Mail $mail)
    {
        //
    }
}
