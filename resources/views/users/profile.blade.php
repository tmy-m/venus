@extends('layouts.main')
@section('content')
    <h3>Hello, <span>{{auth()->user()->name}}</span></h3>
<br><br><br><br><br><br>
    <a class="logout" href="{{route('logout')}}">Logout</a>
   
@endsection