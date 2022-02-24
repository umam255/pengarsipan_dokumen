@extends('layouts.template')
@section('judul', 'My Certificate')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4>My Certificate</h4>
        @if (Auth::user()->status_id !== 3)
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('export') }}" type="button" class="btn btn-sm btn-outline-success">
                    <span data-feather="download"></span>
                    Export to excel
                </a>
            </div>
        @endif

    </div>

    @if (session('succes'))
        <div class="alert alert-success col-md-4">
            {{ session('succes') }}
        </div>
    @endif

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <table class="table">
        <div>
            @if (Auth::user()->status_id !== 3)
                <form name="save-multiple-files" method="POST" action="{{ route('certificate.store') }}"
                    accept-charset="utf-8" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="file" class="form-control" name="files[]" placeholder="Choose files" multiple
                                    required oninvalid="this.setCustomValidity('Field tidak boleh kosong')"
                                    oninput="setCustomValidity('')">
                            </div>
                            <div>
                                <input type="hidden" class="form-control" name="upload_by"
                                    value="{{ Auth::user()->name }}">
                            </div>
                            @error('files')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-2">
                                <select id="status" class="form-control" name="category" required>
                                    <option value="" style="text-align: center">--- select category ---</option>
                                    @foreach ($categories as $data)
                                        <option value="{{ $data->id }}">
                                            {{ $data->nama_category }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 mt-1 mb-2">
                            <button type="submit" class="btn btn-sm btn-outline-primary" id="submit">
                                <i class="fa-solid fa-upload"></i>
                                Upload</button>
                        </div>
                    </div>
                </form>
            @endif


            <div class="row justify-content align-items-center">
                <form action="{{ route('certificate.index') }}" method="get">
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

        </div>
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Batch</th>
                <th scope="col">Category</th>
                <th scope="col">Upload By</th>
                <th scope="col">Created at</th>
                @if (Auth::user()->status_id !== 3)
                    <th scope="col">Action</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
                <tr>
                    <td data-label="No" scope="row">{{ ++$i }}</td>
                    <td data-label="Batch"><a href="{{ $data->path }}"
                            style="text-decoration: none">{{ $data->nama_document }}</a></td>
                    <td data-label="Category">{{ $data->category->nama_category }}</td>
                    <td data-label="Upload By">{{ $data->upload_by }}</td>
                    <td data-label="Created at">{{ $data->created_at }}</td>
                    @if (Auth::user()->status_id !== 3)
                        <td>
                            <form action="{{ route('certificate.destroy', $data->id) }}" method="POST">
                                <a href="{{ route('certificate.edit', $data->id) }}"
                                    class="btn btn-outline-warning btn-sm">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    Edit</a>
                                |
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                    <i class="fa-solid fa-trash"></i>
                                    Delete</button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>

    </table>

    @include('vendor.custom', ['paginator' => $datas])
@endsection
