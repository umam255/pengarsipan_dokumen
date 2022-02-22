@if ($paginator->lastPage() > 1)
    <ul class="pagination col-md-4 p-2" style="text-decoration: none">
        <li class="pagination_li{{ $paginator->currentPage() == 1 ? ' disabled' : '' }}">
            <a class="btn btn-sm border" href="{{ $paginator->url($paginator->currentPage() - 1) }}"
                style="text-decoration: none">Previous</a>
        </li>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <li class="col-sm-1{{ $paginator->currentPage() == $i ? ' active' : '' }}">
                <a class="btn btn-sm border" href="{{ $paginator->url($i) }}"
                    style="text-decoration: none">{{ $i }}</a>
            </li>
        @endfor
        <li class="pagination_li{{ $paginator->currentPage() == $paginator->lastPage() ? ' disabled' : '' }}">
            <a class="btn btn-sm ml-3 border" href="{{ $paginator->url($paginator->currentPage() + 1) }}"
                style="text-decoration: none">Next</a>
        </li>
    </ul>
@endif
