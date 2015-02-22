@extends('app')

@section('content')
    <div class="container">
        @include('errors')

        {!! Form::open(['method' => 'post', 'route' => 'i.contents.store']) !!}
            @include('contents._attributes')
        {!! Form::close() !!}
    </div>
@stop