@component('mail::message')
    # Hello you have a message from {{ $name }}

    {{ $message }}

    Email: {{ $email }}, Phone: {{ $phone }}

    Thanks.
    {{ config('app.name') }}
@endcomponent
