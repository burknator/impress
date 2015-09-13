@extends('app')

@section('content')
    <div class="container">
        @include('errors')

        {!! Form::model($tag, ['method' => 'put', 'route' => ['i.tags.update', $tag->slug]]) !!}
            @include('tags._attributes')
        {!! Form::close() !!}
    </div>
@stop