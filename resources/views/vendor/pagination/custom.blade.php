<style>
    .p-pagination{
        
    }
    ul{
        display: flex;
        justify-content: right;
        list-style: none;
        font-weight: bold;
    }
    a{
        color: inherit;
        text-decoration: none;
    }
    
    li{
        padding: 10px;
        border: solid 1px lightgray;
        
    }
    .nowactive{
        background-color: black;
        color: white;
    }

</style>

@if ($paginator->hasPages())

    <nav class="p-pagination">
        <ul>
        <!-- 前へ移動ボタン -->
        @if ($paginator->onFirstPage())
            <li class="disabled">
                <span class="p-pagination__previous"> < </span>
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}">
                    <span class="p-pagination__previous"> < </span>
                </a>
            </li>
        @endif

        <!-- ページ番号　-->
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="disabled">
                    {{ $element }}
                </li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="nowactive" >
                            {{ $page }}
                        </li>
                    @else
                        <li class="active">
                            <a href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        <!-- 次へ移動ボタン -->
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}">
                    <span class="p-pagination__next"> > </span>
                </a>
            </li>
        @else
            <li class="disabled">
                <span class="p-pagination__next"> > </span>
            </li>
        @endif
        </ul>
    </nav>
@endif 
