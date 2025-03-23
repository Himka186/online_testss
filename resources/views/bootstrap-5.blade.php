@if ($paginator->hasPages())
    <nav class="d-flex justify-items-center justify-content-between">
        <div class="d-flex justify-content-between flex-fill d-sm-none">
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">@lang('pagination.previous')</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
                    </li>
                @endif

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">@lang('pagination.next')</span>
                    </li>
                @endif
            </ul>
        </div>

        <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
            <div class="d-flex align-items-center me-3"> <!-- Добавлен flex и align-items-center -->
                <p class="small text-white mb-0"> <!-- Изменено с text-muted на text-white -->
                    {!! __('Показано') !!}
                    <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
                    {!! __('из') !!}
                    <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
                    {!! __('из всех') !!}
                    <span class="fw-semibold">{{ $paginator->total() }}</span>
                    {!! __('элементов') !!}
                </p>
            </div>

            <div class="d-flex align-items-center">
                <ul class="pagination mb-0">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <span class="page-link" aria-hidden="true">&lsaquo;</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
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
                                    <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                            <span class="page-link" aria-hidden="true">&rsaquo;</span>
                        </li>
                    @endif
                </ul>

                {{-- Форма выбора количества элементов на странице --}}
                <form method="get" action="{{ url('test') }}" class="form-inline ms-3 d-flex align-items-center">
                    <label for="perpage" class="me-2 small text-white mb-0" style="white-space: nowrap;">Элементов на странице:</label>
                    <select name="perpage" id="perpage" class="form-control form-control-sm" onchange="this.form.submit()">
                        <option value="3" @if($paginator->perPage() == 3) selected @endif>3</option>
                        <option value="4" @if($paginator->perPage() == 4) selected @endif>4</option>
                        <option value="5" @if($paginator->perPage() == 5) selected @endif>5</option>
                    </select>
                </form>
            </div>
        </div>
    </nav>
@endif
