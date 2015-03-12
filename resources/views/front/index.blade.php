@extends('front.layout')

@section('content')
    <div class="container">
        @foreach($posts as $post)
            <article>
                <header>
                    <a href="{{ route('front.show', [$post->slug]) }}"><h2>{{ $post->title }}</h2></a>
                </header>
                {{ str_limit($post->text) }}
            </article>
        @endforeach
    </div>
@stop