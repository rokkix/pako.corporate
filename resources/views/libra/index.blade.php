@extends(env('THEME').'.layouts.site')

@section('navigation')
    {!! $navigation !!}
@endsection

@section('slider')
    {!! $sliders !!}
@endsection
@section('content')
    {!! $content !!}
@endsection
@section('sidebar_portfolio')
    {!! $sidebar_portfolio !!}
@endsection
@section('service')
    {!! $service !!}
@endsection
@section('blog')
    {!! $blog !!}
@endsection
@section('reviews')
    {!! $reviews !!}
@endsection
@section('footer')
    {!! $footer !!}
@endsection