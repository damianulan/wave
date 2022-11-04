<!--
    Requirements:
    $pages in the context
    js page function
    $currentPage -->
@foreach ($pages as $num => $page )
    @if (count($pages) > 4)
        
    @endif
    <a class="btn btn-{{$num!=$currentPage ? 'outline-':''}}primary btn-pagination" onclick="page('{{$num}}');">{{$num}}</a>
@endforeach 