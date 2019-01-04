@component('mail::message')
Welcome to DigiZigs

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ setting('app_name') }}
@endcomponent
