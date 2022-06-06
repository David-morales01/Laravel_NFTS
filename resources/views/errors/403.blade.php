@extends('layout.main')

@section('main')
    <div class="errorPage">
        <h1>403 - THIS ACTION IS UNAUTHORIZED.</h1>
        <img src="{{asset('storage/image/interfaces/sadcat.png')}}" alt="Sas Cat"> 
    </div> 
@endsection()