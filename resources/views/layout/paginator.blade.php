 

@if ($paginator->hasPages())



<div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
    <ul class="pagination">
        
         {{-- First Page Link --}}
         @if ($paginator->onFirstPage())
         <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <a class="pagination__link" >
                <i class="w-4 h-4" data-feather="chevrons-left"></i>
            </a>
        </li>


         @else


         <li>
            <a class="pagination__link" href="{{ $paginator->url(1) }}" rel="prev" aria-label="@lang('pagination.previous')">
                <i class="w-4 h-4" data-feather="chevrons-left"></i>
            </a>
        </li>


       

         @endif


            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())

            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <a class="pagination__link">
                    <i class="w-4 h-4" data-feather="chevron-left"></i>
                </a>
            </li>

            @else

            <li>
                <a class="pagination__link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"">
                    <i class="w-4 h-4" data-feather="chevron-left"></i>
                </a>
            </li>

            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                <li>
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                    <a class="pagination__link" href="">...</a>
                </li>
                    
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())

                        <li>
                            <a class="pagination__link pagination__link--active" href="">{{ $page }}</a>
                        </li>


                         
                        @else

                        <li>
                            <a class="pagination__link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                            
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())

            <li>
                <a class="pagination__link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"">
                    <i class="w-4 h-4" data-feather="chevron-right"></i>
                </a>
            </li>
               
            @else

            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <a class="pagination__link" >
                    <i class="w-4 h-4" data-feather="chevron-right"></i>
                </a>
            </li>
               
            @endif


            {{-- Last Page Link --}}
            @if ($paginator->hasMorePages())

            <li>
                <a class="pagination__link" href="{{ $paginator->url($paginator->lastPage()) }}" rel="next" aria-label="@lang('pagination.next')">
                    <i class="w-4 h-4" data-feather="chevrons-right"></i>
                </a>
            </li>

                         
            @else

           

            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <a class="pagination__link" >
                    <i class="w-4 h-4" data-feather="chevrons-right"></i>
                </a>
            </li>
            @endif
            
        </ul>


@endif
