@if ($paginator->hasPages())
    
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="prev page-numbers" aria-hidden="true">Prev</span>
        @else
            <a class="prev page-numbers" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">Prev</a>
        @endif

        @foreach ($elements as $element)
            
            @foreach ($element as $page => $url)
                
                @if ($paginator->currentPage() > 4 && $page === 2)
                    <span class="page-numbers">. . .</span>
                @endif

                @if ($page == $paginator->currentPage())
                    <span class="page-numbers current">{{ $page }}</span>
                @elseif ($page === $paginator->currentPage() + 1 || $page === $paginator->currentPage() + 2 || $page === $paginator->currentPage() - 1 || $page === $paginator->currentPage() - 2 || $page === $paginator->lastPage() || $page === 1)
                    <a class="page-numbers" href="{{ $url }}">{{ $page }}</a>
                @endif

                @if ($paginator->currentPage() < $paginator->lastPage() - 3 && $page === $paginator->lastPage() - 1)
                    <span class="page-numbers">...</span>
                @endif
            @endforeach
        @endforeach

        @if ($paginator->hasMorePages())
            <a class="next page-numbers" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">Next</a>
        @else
            <span class="next page-numbers" aria-hidden="true">Next</span>
        @endif
    </ul>
    
@endif
