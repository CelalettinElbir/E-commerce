@if ($paginator->hasPages())
<ul class="pagination__wrapper d-flex align-items-center justify-content-center">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    <li class="pagination__list disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
        <i class="fa-solid fa-arrow-left"></i>
    </li>
    @else
    <li class="pagination__list">
        <a href="{{ $paginator->previousPageUrl() }}" class="pagination__item link" rel="prev" aria-label="@lang('pagination.previous')">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
    </li>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
    {{-- "Three Dots" Separator --}}
    @if (is_string($element))
    <li class="pagination__list disabled" aria-disabled="true"><span class="pagination__item">{{ $element }}</span></li>
    @endif

    {{-- Array of Links --}}
    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($page == $paginator->currentPage())
    <li class="pagination__list"><span class="pagination__item pagination__item--current">{{ $page }}</span></li>
    @else
    <li class="pagination__list"><a href="{{ $url }}" class="pagination__item link">{{ $page }}</a></li>
    @endif
    @endforeach
    @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    <li class="pagination__list">
        <a href="{{ $paginator->nextPageUrl() }}" class="pagination__item link" rel="next" aria-label="@lang('pagination.next')">
            <i class="fa-solid fa-arrow-right"></i>
        </a>
    </li>
    @else
    <li class="pagination__list disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
        <i class="fa-solid fa-arrow-right"></i>
    </li>
    @endif
</ul>
@endif