@if ($paginator->hasPages())
    <ul class="nav align-items-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li class="page-item" style="display: none" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <span class="page-link" aria-hidden="true">&lsaquo;</span>
        </li>
        @else
        <li class="nav-btn prev">
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
            aria-label="@lang('pagination.previous')">
                <img src="{{asset('assets/front/img/icons/pagination-left.svg')}}" class="svg" alt="">
                <img src="{{asset('assets/front/img/icons/angle-left-red.svg')}}" class="svg" alt="">
            </a>
        </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li aria-current="page"><span class="active">{{ $page }}</span></li>
        @else
        <li><a href="{{ $url }}">{{ $page }}</a></li>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li class="nav-btn next">
            <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                aria-label="@lang('pagination.next')">
            <img src="{{asset('assets/front/img/icons/pagination-right.svg')}}" class="svg" alt="">
            <img src="{{asset('assets/front/img/icons/angle-right-red.svg')}}" class="svg" alt=""></a>
        </li>
        @else
        <li class="page-item disabled" style="display: none" aria-disabled="true" aria-label="@lang('pagination.next')">
            <span class="page-link" aria-hidden="true">&rsaquo;</span>
        </li>
        @endif
    </ul>
@endif