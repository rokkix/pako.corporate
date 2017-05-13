@extends(env('THEME').'.layouts.test')

@section('navigation')
    {!! $navigation !!}
@endsection
@section('content')
    {!! $content !!}
@endsection
@section('footer')
    {!! $footer !!}
@endsection