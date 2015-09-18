@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            @exists ($category)
                @include ('categories.edit')
            @else
                @include ('categories.create')
            @endif
        </div>
        <div class="col-md-6">
            @if($categories->isEmpty())
                <div class="content-placeholder">
                    <h4>No categories yet</h4>
                    <p>
                        You didn't create any categories yet, <a href="{{ route('i.categories.create') }}">add one</a>.
                    </p>
                </div>
            @else
                <h4>Categories</h4>
                <table class="table">
                    <tr>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Contents</th>
                        <th></th>
                    </tr>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>{{ $category->contents()->count() }}</td>
                            <td><a href="{!! route('i.categories.edit', ['category' => $category->slug]) !!}">Edit</a></td>
                        </tr>
                    @endforeach
                </table>
            @endif
        </div>
    </div>
@stop