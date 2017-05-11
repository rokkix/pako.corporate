@extends(env('THEME').'.layouts.site')

@section('navigation')
    {!! $navigation !!}
@endsection
@section('content')
    {!! $content !!}
@endsection
@section('sidebar_portfolio')
    {!! $contact_sidebar !!}
@endsection
@section('footer')
    {!! $footer !!}
@endsection