@if ($paginator->hasPages())

<nav aria-label="Pagination">

    <div class="mt-3">

        {{-- Info --}}
        <div class="mb-2">
            <span class="small text-muted">
                Showing
                <strong>{{ $paginator->firstItem() }}</strong>
                to
                <strong>{{ $paginator->lastItem() }}</strong>
                of
                <strong>{{ $paginator->total() }}</strong>
                results
            </span>
        </div>


        {{-- Pagination --}}
        <ul class="pagination mb-0">

            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link">
                        &lsaquo;
                    </span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link"
                       href="{{ $paginator->previousPageUrl() }}">
                        &lsaquo;
                    </a>
                </li>
            @endif


            {{-- Number --}}
            @foreach ($elements as $element)

                @if (is_string($element))
                    <li class="page-item disabled">
                        <span class="page-link">
                            {{ $element }}
                        </span>
                    </li>
                @endif


                @if (is_array($element))
                    @foreach ($element as $page => $url)

                        @if ($page == $paginator->currentPage())

                            <li class="page-item active">
                                <span class="page-link">
                                    {{ $page }}
                                </span>
                            </li>

                        @else

                            <li class="page-item">
                                <a class="page-link"
                                   href="{{ $url }}">
                                    {{ $page }}
                                </a>
                            </li>

                        @endif

                    @endforeach
                @endif

            @endforeach


            {{-- Next --}}
            @if ($paginator->hasMorePages())

                <li class="page-item">
                    <a class="page-link"
                       href="{{ $paginator->nextPageUrl() }}">
                        &rsaquo;
                    </a>
                </li>

            @else

                <li class="page-item disabled">
                    <span class="page-link">
                        &rsaquo;
                    </span>
                </li>

            @endif

        </ul>

    </div>

</nav>

@endif