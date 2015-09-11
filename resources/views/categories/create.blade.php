@extends('app')

@section('content')
    <div class="container">
        @include('errors')

        {!! Form::open(['method' => 'post', 'route' => 'i.categories.store']) !!}
            @include('categories._attributes')
        {!! Form::close() !!}
    </div>
@stop