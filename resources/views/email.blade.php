Change the link to include both token and email
{{-- <a href="{{ route('resetpassword', ['token' => $token, 'email' => $email]) }}">Reset Password</a> --}}

<a href="{{ route('account.password.reset', ['token' => $token, 'email' => $email]) }}">
    Reset Password
</a>