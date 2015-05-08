@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-right">
                <a href="{!! route('i.categories.create') !!}" class="btn btn-primary">Create new category</a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                @if($categories->isEmpty())
                    <div class="content-placeholder">
                        <h2>No categories yet</h2>
                        <p>
                            You didn't create any categories yet, <a href="{{ route('i.categories.create') }}">add one</a>.
                        </p>
                    </div>
                @else
                    <ul>
                    @foreach($categories as $category)
                        <li><a href="{!! route('i.categories.edit', ['category' => $category->slug]) !!}">{{ $category->name }}</a></li>
                    @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
@stop