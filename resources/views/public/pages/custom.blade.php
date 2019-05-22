@extends('layouts.public')

@section('title', $page->name)

@section('content')
    <div class="spacer feature43">
        <div class="container">
            {!! $page->html !!}
        </div>
    </div>

@stop

@section('js')
<script type="text/javascript">
    // This is for header toggle
$('.op-clo').on('click', function() {
    $('body .h7-nav-box').toggleClass("show");
});

</script>
@stop
