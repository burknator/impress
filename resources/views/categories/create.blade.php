@extends('app')

@section('content')
    <div class="container">
		<h1>Create a new Category</h1>

        {!! Form::open(['method' => 'post', 'route' => 'i.categories.store']) !!}
        @include('categories._attributes')
        {!! Form::close() !!}
    </div>
@stop