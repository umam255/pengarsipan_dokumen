@extends('layouts.template')
@section('judul', 'My Certificate')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit certificate</h1>
    </div>
    <div class="mb-5">
        <form action="{{ route('certificate.update', $certificate->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="mb-3">
                    <embed src="{{ asset($certificate->path) }}" frameborder="0" width="100%" height="400px">
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-md-2 col-form-label text-md-left">Nama document</label>
                    <div class="col-md-3">
                        <input id="batch" type="text" class="form-control" name="batch"
                            value="{{ $certificate->nama_document }}" required>
                    </div>
                </div>
                <div class="row">
                    <label for="name" class="col-md-2 col-form-label text-md-left">Category</label>

                    <div class="col-md-3 mb-2">
                        <select id="status" class="form-control" name="category" required>

                            @foreach ($categories as $data)
                                <option value="{{ $data->id }}" style="text-align: center">
                                    {{ $certificate->category->nama_category }}
                                </option>

                                <option value="{{ $data->id }}">
                                    {{ $data->nama_category }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row col-md-12 p-0 mb-3 mt-2">
                <div class="col-md-1">
                    <a href="{{ URL::previous() }}" class="btn btn-sm btn-outline-secondary">
                        <i class="fa-solid fa-rotate-left"></i>
                        Back</a>
                </div>
                <div class="col-md-1 p-0">
                    <button type="submit" class="btn btn-sm btn-outline-success">
                        <span data-feather="save"></span> Save</button>
                </div>
            </div>

        </form>
    </div>
@endsection
