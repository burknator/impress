@extends('app')

@section('content')
    <div class="container">
        {!! Form::model($category, ['method' => 'patch', 'route' => ['i.categories.update', $category->slug]]) !!}
        @include('categories._attributes')
        {!! Form::close() !!}
    </div>
@stop