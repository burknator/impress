@extends('app')

@section('foot-scripts')
    <script>
        window.$impress = {
            "tags": {!! $tags->toJson() !!},
            "editing": {{ isset($tag) ? 'true' : 'false' }},
            @exists($tag)
                "tag": {!! $tag->toJson() !!}
            @endexists
        }
    </script>
    @parent
@stop

@section('container-id', 'i-tags-edit')

@section('content')
    <div class="row">
        <div class="col-md-6">
            @exists($tag)
                @include('tags.edit')
            @else
                @include('tags.create')
            @endexists
        </div>
        <div class="col-md-6">
            <h4>Tags <a href="{{ route('i.tags.create') }}" class="btn btn-sm btn-link text-uppercase">@icon('plus') New</a></h4>
            <table class="table">
                <tr>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Usage</th>
                    <th></th>
                </tr>
                <tr v-repeat="tag in tags">
                    <td>@{{ tag.name }}</td>
                    <td>@{{ tag.slug }}</td>
                    <td>0</td>
                    <td><a href="@{{ tag.edit_link }}">Edit</a></td>
                </tr>
            </table>
        </div>
    </div>
@stop