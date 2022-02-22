@extends('layouts.template')
@section('judul', 'Category')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4>Category</h4>
    </div>

    @if (session('succes'))
        <div class="alert alert-success col-md-4">
            {{ session('succes') }}
        </div>
    @endif


    <table class="table">
        <a href="#" type="button" class="btn btn-sm btn-outline-dark mb-2" data-bs-toggle="modal"
            data-bs-target="#exampleModal">
            <i class="fa-solid fa-circle-plus"></i> Add categoy
        </a>
        <div class="row justify-content align-items-center">
            <form action="{{ route('category.index') }}" method="get">
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
                <th scope="col">created at</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
                <tr>
                    <td data-label="No" scope="row">{{ ++$i }}</td>
                    <td data-label="Name">{{ $data->nama_category }}</td>
                    <td data-label="Created at">{{ $data->created_at }}</td>
                    <td data-label="Action">
                        <form action="{{ route('user.destroy', $data->id) }}" method="POST">
                            <a href="#" type="button" class="btn btn-sm btn-outline-warning" data-bs-toggle="modal"
                                data-bs-target="#editModal{{ $data->id }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                                edit</a>
                            @csrf
                            @method('DELETE')
                            <a href="#" type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $data->id }}">
                                <i class="fa-solid fa-trash"></i> Delete
                            </a>
                            @include('management_certificate.category.modal.delete')
                        </form>
                    </td>
                </tr>
                @include('management_certificate.category.modal.edit')
            @endforeach
        </tbody>
    </table>

    @include('management_certificate.category.modal.add')
@endsection
