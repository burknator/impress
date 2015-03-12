@extends('app')

@section('content')
    <div class="container">
        <ul>
        @foreach($categories as $category)
            <li><a href="{!! route('i.categories.edit', ['category' => $category->slug]) !!}">{{ $category->name }}</a></li>
        @endforeach
        </ul>
    </div>
@stop