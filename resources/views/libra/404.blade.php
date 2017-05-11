@extends(env('THEME'). '.layouts.site')

@section('content')
@section('navigation')
    {!! $navigation !!}
@endsection


<div id="content-index" class="span12 content group">
    <img class="error-404-image group" src="{{ asset(env('THEME')) }}/images/pages/404.png" title="Error 404" alt="404" />
    <div class="error-404-text group">
        <p>We are sorry but the page you are looking for does not exist.<br />You could
            <a href="#">return to the home page</a> or search using the search box below.</p>

    </div>
</div>
@endsection
@section('footer')
    @include(env('THEME').'.footer')
@endsection
