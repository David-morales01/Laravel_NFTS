@extends('layout.main')
@section('main')

    <form method="POST" action="{{ route('password.confirm') }}">

        @csrf
        
        <label>
            <span>Password</span>
            input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
        
        </label>
        <button> Confirm </button> 

    </form>
    
@endsection
