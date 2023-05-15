@if ($paginator->hasPages())
    <ul class="pagination home-product__pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="pagination-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <a href="" class="pagination-item__link">
                    <i class="pagination-item__icon fa-solid fa-angle-down fa-rotate-90"></i>
                </a>
            </li>
        @else
            <li>
                <a class="pagination-item__link" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                    aria-label="@lang('pagination.previous')">
                    <i class="pagination-item__icon fa-solid fa-angle-down fa-rotate-90"></i>
                </a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="pagination-item active" aria-current="page">
                            <a href="{{ $url }}" class="pagination-item__link">{{ $page }}</a>
                        </li>
                    @else
                        <li><a class="pagination-item__link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="pagination-item">
                <a class="pagination-item__link" href="{{ $paginator->nextPageUrl() }}" rel="next"
                    aria-label="@lang('pagination.next')">
                    <i class="pagination-item__icon fa-solid fa-angle-down fa-rotate-270"></i>
                </a>
            </li>
        @else
            <li class="pagination-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <a href="" class="pagination-item__link">
                    <i class="pagination-item__icon fa-solid fa-angle-down fa-rotate-270"></i>
                </a>
            </li>
        @endif
    </ul>
@endif
