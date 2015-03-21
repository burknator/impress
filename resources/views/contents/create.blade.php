@extends('app')

@section('head-styles')
    @parent
    <link rel="stylesheet" href="/css/codemirror.css">
@stop

@section('foot-scripts')
    <script src="/js/codemirror.js"></script>
    <script src="/js/mode/markdown.js"></script>
    @parent
@stop

@section('content')
    <div class="container">
        @include('errors')

        {!! Form::open(['method' => 'post', 'route' => 'i.contents.store']) !!}
            @include('contents._attributes')
        {!! Form::close() !!}
    </div>
@stop