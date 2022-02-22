@extends('layouts.template')
@section('judul', 'Change password')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4>Change password</h4>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('update_password') }}">
        @method('PATCH')
        @csrf
        <div class="col-md-12">
            <div class="row mb-3 mt-5">
                <label for="old_password" class="col-md-2 col-form-label text-md-left">Current password</label>

                <div class="col-md-6">
                    <input id="old_password" type="text" class="form-control" name="old_password">
                </div>
                @error('old_password')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="row mb-3">
                <label for="password" class="col-md-2 col-form-label text-md-left">New password</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password">
                </div>
                @error('password')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="row mb-3">
                <label for="password_confirmation" class="col-md-2 col-form-label text-md-left">Confirm password</label>

                <div class="col-md-6">
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">
                </div>
            </div>

            <div class="mt-4 mb-3">
                <a href="{{ URL::previous() }}" class="btn btn-sm btn-outline-secondary">
                    <i class="fa-solid fa-rotate-left"></i>
                    Back</a>
                <button type="submit" class="btn btn-sm btn-outline-success"><span data-feather="save"></span> Save</button>
            </div>
        </div>
    </form>
@endsection
