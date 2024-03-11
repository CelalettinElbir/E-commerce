@if ($paginator->hasPages())
    <ul class="pagination__wrapper d-flex align-items-center justify-content-center">
        {{-- Önceki Sayfa Bağlantısı --}}
        @if ($paginator->onFirstPage())
            {{-- Önceki Sayfa Bağlantısı --}}
            <li class="pagination__list disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <i class="fa-solid fa-arrow-left"></i>
            </li>
        @else
            <li class="pagination__list">
                <a href="{{ $paginator->previousPageUrl() }}" class="pagination__item link" rel="prev"
                    aria-label="@lang('pagination.previous')">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
            </li>
        @endif


        {{-- Sayfa Numaraları --}}
        @foreach ($elements as $element)
            {{-- "Üç Nokta" Ayırıcı --}}
            @if (is_string($element))
                <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span>
                </li>
            @endif

            {{-- Bağlantılar Dizisi --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="pagination__list"><span
                                class="pagination__item pagination__item--current">{{ $page }}</span></li>
                    @else
                        <li class="pagination__list"><a href="{{ $url }}"
                                class="pagination__item link">{{ $page }}</a></li>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach




        @if ($paginator->hasMorePages())
            {{-- Sonraki Sayfa Bağlantısı --}}
            <li class="pagination__list">
                <a href="{{ $paginator->nextPageUrl() }}" class="pagination__item link" rel="next"
                    aria-label="@lang('pagination.next')">
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </li>
        @else
            {{-- Sonraki Sayfa Bağlantısı Yoksa --}}
            <li class="pagination__list disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <i class="fa-solid fa-arrow-right"></i>
            </li>
        @endif



    </ul>

    

@endif
