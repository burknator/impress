@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-right">
                <a href="{!! route('i.tags.create') !!}" class="btn btn-primary">Create new tag</a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                @if($tags->isEmpty())
                    <div class="content-placeholder">
                        <h2>No tags yet</h2>
                        <p>
                            You didn't create any tags yet, <a href="{{ route('i.tags.create') }}">add one</a>.
                        </p>
                    </div>
                @else
                    <ul>
                    @foreach($tags as $tag)
                        <li><a href="{!! route('i.tags.edit', ['tags' => $tag->slug]) !!}">{{ $tag->name }}</a></li>
                    @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
@stop