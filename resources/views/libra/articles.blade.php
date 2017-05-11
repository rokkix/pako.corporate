@extends(env('THEME').'.layouts.site')

@section('navigation')
    {!! $navigation !!}
@endsection
@section('content')
    {!! $content !!}
@endsection
@section('sidebar_portfolio')
    {!! $articles_bar !!}
@endsection
@section('footer')
    {!! $footer !!}
@endsection