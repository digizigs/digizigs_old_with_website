<?php

namespace App\Http\Resources\Mail;

use Illuminate\Http\Resources\Json\Resource;

class MailCollection extends Resource
{
    
    public function toArray($request)
    {
        return [
            'domain' => $this->domain,        
            'type' => $this->type,        
            'label' => $this->label,
            'status' => $this->status,
            'star' => $this->starred,
            'sender' => $this->sender,
            'recipient' => $this->recipient,
            'from' => $this->from,
            'to' => $this->to,
            'cc' => $this->cc,
            'bcc' => $this->bcc,
            'subject' => $this->subject,
            'body_plain' => $this->body_plain,
            'body_html' => $this->body_html,
            'attachment' => $this->attachment,
            'date' => $this->created_at,
        ];
    }
    
}
