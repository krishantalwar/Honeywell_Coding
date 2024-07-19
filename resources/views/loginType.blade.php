@extends('layout')
@section('content')

    <div class="form-signin">
        <a class="btn btn-lg btn-primary btn-block" href="{{ route('adminlogin') }}">Admin login</a>
        <a class="btn btn-lg btn-primary btn-block" href="{{ route('userlogin') }}">Customer login</a>
    </div>
@stop
