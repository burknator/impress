@extends('app')

@section('content')
    <div class="container">
        @include('errors')

        {!! Form::model($category, ['method' => 'put', 'route' => ['i.categories.update', $category->slug]]) !!}
            @include('categories._attributes')
        {!! Form::close() !!}
    </div>
@stop