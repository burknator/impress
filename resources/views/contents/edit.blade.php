@extends('app')

@section('content')
    <div class="container">
        @include('errors')

        {!! Form::model($content, ['method' => 'put', 'route' => ['i.contents.update', $content->slug], 'id' => 'i-contents-edit']) !!}
            @include('contents._attributes', ['content' => $content])
        {!! Form::close() !!}
    </div>
@stop