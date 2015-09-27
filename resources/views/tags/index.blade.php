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
    <div id="delete-tag-form" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete Tag @{{ deleteTag.name }}</h4>
                </div>
                <form method="post" action="@{{ deleteTag.destroy_link }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="modal-body">
                        <p>Are you really sure you want to delete the tag @{{ deleteTag.name }}? This action cannot be undone!</p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary">Yes, I'm sure</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
                    <td><a href="@{{ tag.edit_link }}">@{{ tag.name }}</a></td>
                    <td>@{{ tag.slug }}</td>
                    <td>0</td>
                    <td>
                        <a href="javascript:void(0);"
                           data-toggle="modal"
                           data-target="#delete-tag-form"
                           class="text-danger"
                           v-on="click: deleteTag = tag">Delete</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@stop