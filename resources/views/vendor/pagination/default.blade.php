@if ($paginator->hasPages())
    <nav class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            {{-- <li class="disabled"><span>&laquo;</span></li> --}}
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="pagination-previous">Previous</a>
        @endif
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="pagination-next">Next page</a>
        @else
            {{-- <li class="disabled"><span>&raquo;</span></li> --}}
        @endif

        {{-- Pagination Elements --}}
        <ul class="pagination-list">
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li><span class="pagination-ellipsis">&hellip;</span></li>
                {{-- <li class="disabled"><span>{{ $element }}</span></li> --}}
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li>
                            <a class="pagination-link is-current">{{ $page }}</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ $url }}" class="pagination-link">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach
        </ul> 
    </nav>
@endif
