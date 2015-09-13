@extends('app')

@section('content')
    <div class="container">
        @include('errors')

        {!! Form::open(['method' => 'post', 'route' => 'i.tags.store']) !!}
            @include('tags._attributes')
        {!! Form::close() !!}
    </div>
@stop