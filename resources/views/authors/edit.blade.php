@extends('app')

@section('content')
    <div class="container">
        @include('errors')

        {!! Form::model($author, ['method' => 'put', 'route' => ['i.authors.update', $author->id]]) !!}
        @include('authors._attributes')
        {!! Form::close() !!}
    </div>
@stop