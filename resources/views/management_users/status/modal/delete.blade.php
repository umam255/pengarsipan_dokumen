<!-- Modal -->
<div class="modal fade" id="deleteModal{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete status </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('status.destroy', $data->id) }}">
                @csrf
                <div class="modal-body">
                    <a>Are you sure want to delete <b> {{ $data->nama_status }} </b> ?</a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark"></i>
                        Close</button>
                    <button type="submit" class="btn btn-sm btn-outline-danger">
                        <i class="fa-solid fa-trash"></i>
                        Delete</button>
                </div>
            </form>

        </div>
    </div>
</div>
