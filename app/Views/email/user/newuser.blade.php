@component('mail::message')
Welcome to DigiZigs

Thanks for connecting us,we will get back to you _soon_.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ setting('app_name') }}
@endcomponent
