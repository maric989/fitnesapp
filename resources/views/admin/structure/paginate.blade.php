@section('head-css')
    @parent
    <link rel="stylesheet" href="{{ mix('/css/admin/paginator.css') }}" />
@endsection
@if ($paginator->hasPages())
    <div class="paginator flex h-align-right font-medium-weight">
        <div class="element">
            @if ($paginator->onFirstPage())
                <span class="flex v-align-center h-align-center disable-paginator">&lsaquo;</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" class="flex v-align-center h-align-center">&lsaquo;</a>
            @endif
        </div>
        @foreach ($elements as $element)
            @if (is_string($element))
                <div class="element">
                    <span class="flex v-align-center h-align-center">{{ $element }}</span>
                </div>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    <div class="element">
                        @if ($page == $paginator->currentPage())
                            <span class="flex v-align-center h-align-center active-paginator">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="flex v-align-center h-align-center">{{ $page }}</a>
                        @endif
                    </div>
                @endforeach
            @endif
        @endforeach
        <div class="element">
            @if ($paginator->onLastPage())
                <span class="flex v-align-center h-align-center disable-paginator">&rsaquo;</span>
            @else
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.previous')" class="flex v-align-center h-align-center">&rsaquo;</a>
            @endif
        </div>
    </div>
@endif
