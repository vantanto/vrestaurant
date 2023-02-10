@php $align = $align ?? 'l'; @endphp
@if ($paginator->hasPages())
    <ul role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="pagination d-flex @if($align == 'c') justify-content-center @elseif($align == 'r') justify-content-end @endif }}">
        {{-- Previous Page Link --}}
        @if (!$paginator->onFirstPage())
            <li class="page-item">
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="page-link" aria-label="{{ __('pagination.previous') }}">
                    Prev
                </a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span aria-disabled="true">
                    {{ $element }}
                </span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active">
                            <span aria-current="page" class="page-link">
                                {{ $page }}
                            </span>
                        </li>
                    @else
                        <li class="page-item">
                            <a href="{{ $url }}" class="page-link" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                {{ $page }}
                            </a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="page-link" aria-label="{{ __('pagination.next') }}">
                    Next
                </a>
            </li>
        @endif
    </ul>
@endif
