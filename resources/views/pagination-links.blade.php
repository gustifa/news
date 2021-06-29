@if ($paginator->hasPages())
<nav aria-label="Page navigation example">
    <ul class="pagination">
       
        @if ($paginator->onFirstPage())
            <li class="page-link"><span>← Previous</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="page-link">← Previous</a></li>
        @endif


      
        @foreach ($elements as $element)
           
            @if (is_string($element))
                <li class="page-link"><span>{{ $element }}</span></li>
            @endif


           
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-link" class="active my-active"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach


        
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next" class="page-link">Next →</a></li>
        @else
            <li class="page-link"><span>Next →</span></li>
        @endif
    </ul>
</nav>
@endif 