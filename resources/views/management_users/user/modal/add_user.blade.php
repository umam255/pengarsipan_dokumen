    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('user.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('Name') }}</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" required>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" required>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-left">{{ __('Password') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="status"
                                class="col-md-4 col-form-label text-md-left">{{ __('Status') }}</label>

                            <div class="col-md-8">
                                <select id="status" class="form-control" name="status" required>
                                    <option value="" style="text-align: center">--select--</option>
                                    @foreach ($status as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_status }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">
                            <i class="fa-solid fa-xmark"></i>
                            Close</button>
                        <button type="submit" class="btn btn-sm btn-outline-success">
                            <span data-feather="save"></span>
                            Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
