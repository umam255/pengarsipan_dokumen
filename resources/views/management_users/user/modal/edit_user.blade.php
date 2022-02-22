    <!-- Modal -->
    <div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('user.update', $user->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('Name') }}</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ $user->name }}" required>

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
                                <input id="email" type="email" class="form-control" name="email"
                                    value="{{ $user->email }}" required>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <input id="password" type="password" class="form-control" name="password"
                            value="{{ $user->password }}" hidden>

                        <div class="row mb-3">
                            <label for="status"
                                class="col-md-4 col-form-label text-md-left">{{ __('Status') }}</label>

                            <div class="col-md-4">
                                <select id="status" class="form-control" name="status">
                                    <option value="{{ $user->status_id }}">
                                        {{ $user->status->nama_status }}
                                    </option>
                                    <option style="text-align: center" value="">-----------</option>
                                    @foreach ($status as $data)
                                        <option value="{{ $data->id }}">
                                            {{ $data->nama_status }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('user.show', $user->id) }}" type="button"
                            class="btn btn-sm btn-outline-warning"><i class="fa-solid fa-key"></i> Reset
                            password</a>
                        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">
                            <i class="fa-solid fa-xmark"></i> Close
                        </button>
                        <button type="submit" class="btn btn-sm btn-outline-success">
                            <span data-feather="save"></span> Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
