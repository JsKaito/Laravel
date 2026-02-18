@if ($paginator->hasPages())
    <nav>
        <ul class="pagination justify-content-center mb-0" style="margin-bottom: 1.5rem;">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled"><span class="page-link bg-dark text-light border-secondary" style="min-width:120px;">{{ __('pagination.previous') }}</span></li>
            @else
                <li class="page-item"><a class="page-link bg-dark text-light border-secondary" style="min-width:120px;" href="{{ $paginator->previousPageUrl() }}" rel="prev">{{ __('pagination.previous') }}</a></li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled"><span class="page-link bg-dark text-light border-secondary">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link bg-primary text-light border-primary">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link bg-dark text-light border-secondary" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item"><a class="page-link bg-dark text-light border-secondary" style="min-width:120px;" href="{{ $paginator->nextPageUrl() }}" rel="next">{{ __('pagination.next') }}</a></li>
            @else
                <li class="page-item disabled"><span class="page-link bg-dark text-light border-secondary" style="min-width:120px;">{{ __('pagination.next') }}</span></li>
            @endif
        </ul>
    </nav>
@endif
