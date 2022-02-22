@extends('layouts.template')
@section('judul', 'Management User')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4>Management Users</h4>
    </div>

    @if (session('succes'))
        <div class="alert alert-success col-md-4">
            {{ session('succes') }}
        </div>
    @endif


    <table class="table">
        <a href="#" type="button" class="btn btn-sm btn-outline-dark mb-2" data-bs-toggle="modal"
            data-bs-target="#exampleModal">
            <i class="fa-solid fa-circle-plus"></i> Add user
        </a>
        <div class="row justify-content align-items-center">
            <form action="{{ route('user.index') }}" method="get">
                <div class="col-sm-3 mt-2 mb-2">
                    <input class="form-control" type="text" name="search" placeholder="Search" aria-label="Search">
                </div>
                <div class="col-sm-2 p-2">
                    <button class="btn btn-sm btn-outline-secondary">
                        <i class="fa-solid fa-magnifying-glass"></i> Search
                    </button>
                </div>
            </form>
        </div>
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                <th scope="col">Created at</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $user)
                <tr>
                    <td data-label="No" scope="row">{{ ++$i }}</td>
                    <td data-label="Name">{{ $user->name }}</td>
                    <td data-label="Email">{{ $user->email }}</td>
                    <td data-label="Status">{{ $user->status->nama_status }}</td>
                    <td data-label="Created at">{{ $user->created_at }}</td>
                    <td data-label="Action">
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                            <a href="#" type="button" class="btn btn-sm btn btn-outline-warning" data-bs-toggle="modal"
                                data-bs-target="#editModal{{ $user->id }}">
                                <i class="fa-solid fa-user-pen"></i>
                                edit</a>
                            @csrf
                            @method('DELETE')
                            <a href="#" type="button" class="btn btn-sm btn btn-outline-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $user->id }}">
                                <i class="fa-solid fa-user-xmark"></i> Delete
                            </a>
                            @include('management_users.user.modal.delete_user')
                        </form>
                    </td>
                </tr>
                @include('management_users.user.modal.edit_user')
            @endforeach
        </tbody>
    </table>

    @include('management_users.user.modal.add_user')
@endsection
