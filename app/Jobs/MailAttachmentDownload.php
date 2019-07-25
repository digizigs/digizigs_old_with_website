<?php

namespace App\Jobs;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Log;

class MailAttachmentDownload implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $mailbox;
    public $mailid;
    public $file;
    

    public function __construct($mailbox,$mailid,$file) {
        $this->mailbox = $mailbox;
        $this->mailid = $mailid;
        $this->file = $file;
    }

  
    public function handle()
    {
        $response = (new Client())->get($this->file['url'], [
             //'auth' => ['api','key-332a5921c4c971f7f1d30d7385e24402'],
             'auth' => ['api', config('services.mailgun.secret')],
        ]);

        $item = $response->getBody();
        $timestamp = time().str_random();

        $attachment = new Attachment;
        $attachment->mailid = $this->mailid;
        $attachment->file_name = $this->file['name'];
        $attachment->file_url = storage_path('app/mailbox/').$this->mailbox.'/'.$timestamp.$this->file['name'];
        $attachment->save();

        Storage::put('/mailbox/'.$this->mailbox.'/'.$timestamp.$this->file['name'],$item);
        app('log')->debug($this->file['name']);


    }
}
