@extends('layout.main')
@section('main')
<div class="register">
    
<form method="POST" action="{{ route('password.email') }}" class="form form_auth">
    @csrf


 
        <input id="email"  type="email" name="email" :value="old('email')" placeholder="Write your email" required   />
     

    <button class="button">
        Email Password Reset Link
    </button> 

</form>
</div>

@endsection