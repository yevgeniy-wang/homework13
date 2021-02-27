<div class="mb-3">
    <nav aria-label="...">
        <ul class="pagination">
            @if($posts->currentPage() != 1)
                <li class="page-item">
                    <a class="page-link" href="{{ $posts->previousPageUrl() }}">Previous</a>
                </li>
                @if($posts->currentPage() - 3 >= 1)
                    <li class="page-item">
                        <a class="page-link" href="/{{ $page }}">1</a>
                    </li>
                    <li class="page-item disabled">
                        <a class="page-link">...</a>
                    </li>
                @endif
                <li class="page-item">
                    <a class="page-link"
                       href="{{ $posts->previousPageUrl() }}">{{ $posts->currentPage() - 1 }}</a>
                </li>
            @endif
            <li class="page-item active" aria-current="page">
                <a class="page-link">{{$posts->currentPage()}}</a>
            </li>
            @if($posts->currentPage() != $posts->lastPage())
                <li class="page-item">
                    <a class="page-link" href="{{ $posts->nextPageUrl() }}">{{ $posts->currentPage() + 1 }}</a>
                </li>
                @if($posts->currentPage() + 3 <= $posts->lastPage())
                    <li class="page-item disabled">
                        <a class="page-link">...</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link"
                           href="/{{ $page . '?page=' . $posts->lastPage() }}">{{ $posts->lastPage() }}</a>
                    </li>
                @endif
                <li class="page-item">
                    <a class="page-link"
                       href="{{$posts->nextPageUrl() }}">Next</a>
                </li>
            @endif
        </ul>
    </nav>
</div>
