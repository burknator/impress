@extends('app')

@section('content')
    @include('errors')
    <h1>Add a new author</h1>

    {!! Form::open(['method' => 'post', 'route' => 'i.authors.store']) !!}
    @include('authors._attributes')
    {!! Form::close() !!}
@stop