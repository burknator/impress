@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                @exists ($tag)
                    @include('tags.edit')
                @else
                    @include('tags.create')
                @endif
            </div>
            <div class="col-md-6">
                <h4>Tags</h4>
                <table class="table">
                    <tr>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Usage</th>
                        <th></th>
                    </tr>
                    @foreach($tags as $tag)
                        <tr>
                            <td>{{ $tag->name }}</td>
                            <td>{{ $tag->slug }}</td>
                            <td>{{ $tag->contents()->count() }}</td>
                            <td><a href="{{ route('i.tags.edit', ['tags' => $tag->slug]) }}"><span class="glyphicon glyphicon-pencil"></span> Edit</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@stop