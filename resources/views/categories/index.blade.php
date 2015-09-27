@extends('app')

@section('foot-scripts')
    <script>
        window.$impress = {
            "categories": {!! $categories->toJson() !!},
            "editing": {{ isset($category) ? 'true' : 'false' }},
            @exists($category)
                "category": {!! $category->toJson() !!}
            @endexists
        }
    </script>
    @parent
@stop

@section('container-id', 'i-categories-edit')

@section('content')
    <div class="row">
        <div class="col-md-6">
            @exists($category)
                @include ('categories.edit')
            @else
                @include ('categories.create')
            @endexists
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
                <h4>Categories <a href="{{ route('i.categories.create') }}" class="btn btn-sm btn-link text-uppercase">@icon('plus') New</a></h4>
                <table class="table">
                    <tr>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Contents</th>
                        <th></th>
                    </tr>
                    <tr v-repeat="category in categories">
                        <td>@{{ category.name }}</td>
                        <td>@{{ category.slug }}</td>
                        <td>0</td>
                        <td><a href="@{{ category.edit_link }}">Edit</a></td>
                    </tr>
                </table>
            @endif
        </div>
    </div>
@stop