@extends('layout.main')
@section('main')

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <label>
            <span>Email</span>

            <input id="email" type="email" name="email" :value="old('email', $request->email)" required autofocus />
        </label>
 
        <label>
            <span>Password</span>

            <input id="password" type="password" name="password" required />
        </label>
 
        <label>
            <span>Confirm Password</span>

            <input id="password_confirmation" type="password" name="password_confirmation" required />
        </label>
 
            <button>Reset Password</button> 
    </form>
   
@endsection
