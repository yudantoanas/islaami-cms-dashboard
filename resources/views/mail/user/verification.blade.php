@component('mail::message')
# Welcome

The body of your message. {{ $number }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
