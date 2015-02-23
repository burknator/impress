@extends('app')

@section('content')
    <div class="container">
        @include('errors')

        {!! Form::model($content, ['method' => 'put', 'route' => 'i.contents.update']) !!}
            @include('contents._attributes')
        {!! Form::close() !!}
    </div>
@stop