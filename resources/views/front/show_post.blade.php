@extends('front.layout')

@section('content')
    <div class="container">
        <article>
            <header>
                <h1>{{ $content->title }}</h1>
                published <time datetime="{{ $content->published_at }}">{{ $content->published_at->diffForHumans() }}</time>
            </header>
            <hr>
            {{ $content->text }}
        </article>
    </div>
@stop