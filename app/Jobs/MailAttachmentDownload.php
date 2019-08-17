<?php

namespace App\Jobs;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use Carbon\Carbon;
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
             'auth' => ['api', config('services.mailgun.secret')],
        ]);

        $item = $response->getBody();
        $timestamp = time().str_random();
        $time = Carbon::now();
        $date = Carbon::now()->format('Ymd');

        $attachment = new Attachment;
        $attachment->mail_id = $this->mailid;
        $attachment->file_name = $this->file['name'];
        $attachment->content_type = $this->file['content-type'];
        $attachment->file_type = \File::extension($this->file['name']);
        $attachment->file_url = 'app/mailbox/' . $this->mailbox . '/' . $date . '/' . $timestamp . '_' . $this->file['name'];
        $attachment->save();

        Storage::put('/mailbox/'.$this->mailbox.'/'.$date.'/'.$timestamp . '_' . $this->file['name'],$item);
        app('log')->debug($this->file['name']);


    }
}
