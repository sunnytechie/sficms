@component('mail::message')

    <p>
        Hello {{ $user->name }},
    </p>
<h1>{{ $details['title'] }}</h1>

<p>{!! $details['message'] !!}</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
