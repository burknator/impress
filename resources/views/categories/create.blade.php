@extends('app')

@section('content')
    <div class="container">
        {!! Form::open(['method' => 'post', 'route' => 'i.categories.store']) !!}
        @include('categories._attributes')
        {!! Form::close() !!}
    </div>
@stop