@component('mail::message')
    <p>{{ __('Hello, ' . $user->name) }}</p>
    <br>
    Your Registration was sucessfull, Verify email to proceed.
    @component('mail::button', [
        'url' => 'https://myonlineclinic.ng/verify/email/' . $user->id . '/' . sha1($user->id),
    ])
        {{ __('Verify Email') }}
    @endcomponent
    {{ __('Thanks,') }}<br>
    {{ config('app.name') }}
@endcomponent
