<?php

namespace App\Http\Resources\Mail;

use Illuminate\Http\Resources\Json\JsonResource;

class MailResource extends JsonResource
{
    
    public function toArray($request)
    {
        return [
            'domain' => $this->domain,
            'type' => $this->type,
            'label' => $this->label,
            'domain' => $this->domain,
            'from' => $this->from,
            'to' => $this->to,
            'cc' => $this->cc,
            'bcc' => $this->bcc,
            'subject' => $this->subject,
            'body' => $this->body_html,
            'attachment' => $this->attachment,
        ];
    }
}
