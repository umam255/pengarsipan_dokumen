<!-- Modal -->
<div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete user </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('user.destroy', $user->id) }}">
                @csrf
                <div class="modal-body">
                    <a>Are you sure want to delete <b> {{ $user->name }} </b> ?</a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">
                        <i class="fa-solid fa-user-xmark"></i>
                        Close</button>
                    <button type="submit" class="btn btn-sm btn-outline-danger">
                        <span data-feather="trash"></span>
                        Delete</button>
                </div>
            </form>

        </div>
    </div>
</div>
