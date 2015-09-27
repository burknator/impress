@extends('app')

@section('foot-scripts')
    <script>
        window.$impress = {
            "tags": {!! $tags->toJson() !!},
            @exists($tag)
                "tag": {!! $tag->toJson() !!}
            @endexists
        }
    </script>
    @parent
@stop

@section('container-id', 'i-tags-index')

@section('content')
    <div id="delete-tag-form" class="modal fade" v-if="deleteTag.id != ''">
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

    <div id="delete-tags-form" class="modal fade" v-if="selected.length > 0">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete Selected Tags</h4>
                </div>
                <form method="post" action="{{ route('i.tags.destroy') }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="modal-body">
                        <p>
                            Are you sure you want to delete these tags?
                        </p>
                        <ul class="list-group">
                            <li class="list-group-item" v-repeat="tag in selected">@{{ tag.name }} <small class="text-muted">@{{ tag.slug }}</small></li>
                        </ul>
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
        <div class="col-md-12">
            <h1>Tags <a href="{{ route('i.tags.create') }}" class="btn btn-sm btn-link text-uppercase">@icon('plus') New</a></h1>
            <a href="#delete-tags-form" class="btn btn-danger btn-sm" data-toggle="modal" v-attr="disabled: selected.length == 0">Delete</a>
            <table class="table table-hover tag-list">
                <thead>
                    <tr>
                        <th><input type="checkbox" v-model="checkedAll"></th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Usage</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-repeat="tag in tags" v-on="click: tag.selected = !tag.selected">
                        <td style="border-left-color: #@{{ tag.color.hex }}"><input type="checkbox" v-model="tag.selected"></td>
                        <td><a href="@{{ tag.edit_link }}">@{{ tag.name }}</a></td>
                        <td>@{{ tag.slug }}</td>
                        <td>@{{ tag.contents }}</td>
                        <td>
                            <a href="@{{ tag.edit_link }}">Edit</a>
                        </td>
                        <td>
                            <a href="#delete-tag-form"
                               data-toggle="modal"
                               class="text-danger"
                               v-on="click: deleteTag = tag">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@stop