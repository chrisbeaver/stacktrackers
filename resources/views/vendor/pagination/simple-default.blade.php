@if ($paginator->hasPages())
    <nav class="pagination">
        
        <a class="pagination-next">Next page</a>
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><span>&laquo;</span></li>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="pagination-previous">Previous</a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
        @else
            <li class="disabled"><span>&raquo;</span></li>
        @endif
    </nav>
@endif
