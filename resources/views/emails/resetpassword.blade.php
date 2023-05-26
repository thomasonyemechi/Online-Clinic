@component('mail::message')
    <p>{{ __('Hello, ' . $user->name) }}</p>
    <br>
    {{ __('You recently requested to reset the password for your account. Click the button below to proceed.') }}
    @component('mail::button', [
        'url' => 'https://myonlineclinic.ng/reset-password/' . $token->token,
    ])
        {{ __('Reset Password') }}
    @endcomponent
    {{ __('If you did not request a password reset, please ignore this email or reply to let us know.') }}
    {{ __('This password reset link is only valid for the next 30 minutes.') }} <br><br>
    {{ __('Thanks,') }} , the {{ env('APP_NAME') }} team
@endcomponent
