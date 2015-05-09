@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-right">
                <a href="{!! route('i.authors.create') !!}" class="btn btn-primary">Add new author</a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                @if($authors->isEmpty())
                    <div class="content-placeholder">
                        <h2>No authors yet</h2>
                        <p>
                            You didn't create any authors yet, <a href="{{ route('i.authors.create') }}">add one</a>.
                        </p>
                    </div>
                @else
                    <ul>
                    @foreach($authors as $author)
                        <li><a href="{!! route('i.authors.edit', ['id' => $author->id]) !!}">{{ $author->email }}</a></li>
                    @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
@stop