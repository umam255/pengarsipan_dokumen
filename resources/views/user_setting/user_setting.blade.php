@extends('layouts.template')
@section('judul', 'User setting')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4>{{ Auth::user()->name }}</h4>
    </div>
    <a href="{{ route('change_password') }}" style="color: black" class="btn btn-sm btn-outline-warning"><span
            data-feather="key"></span> Change
        password</a>
@endsection
