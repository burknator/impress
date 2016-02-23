@extends('app')

@section('container-id', 'i-tags-form')

@section('content')
    @include('errors')

    {!! Form::open(['method' => 'post', 'route' => 'i.tags.store', 'class' => 'form-horizontal']) !!}
        @include('tags._attributes')
    {!! Form::close() !!}
@stop