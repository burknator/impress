@extends('app')

@section('foot-scripts')
    <script>
        window.$impress = {
            "contents" : {!! $contents->toJson() !!}
        }
    </script>

    @parent
@stop

@section('container-id', 'i-tags-edit')

@section('content')
    @include('errors')

    <div class="row">
        <div class="col-md-12">
            {!! Form::model($tag, ['route' => ['i.tags.update', $tag->slug], 'method' => 'put', 'class' => 'form-horizontal']) !!}
                @include('tags._attributes')
            {!! Form::close() !!}
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Created</th>
                        <th>Published</th>
                        <th>Tags</th>
                        <th>Author</th>
                        <th>Last Editor</th>
                    </tr>
                    <tr v-if="contents.length == 0">
                        <td colspan="7" class="placeholder-block">
                            <h4>No contents for this tag</h4>
                        </td>
                    </tr>
                </thead>
                <tr v-repeat="content in contents" v-if="contents.length > 0">
                    <td><a href="@{{ content.edit_link }}">@{{ content.title }}</a></td>
                    <td>@{{ content.type | capitalize }}</td>
                    <td>
                        <time datetime="@{{ content.created_at.date }}"
                              data-toggle="tooltip"
                              title="@{{ content.created_at.date }}">
                            @{{ content.created_at_diff }}
                        </time>
                    </td>
                    <td>
                        <time datetime="@{{ content.published_at.date }}"
                              data-toggle="tooltip"
                              title="@{{ content.published_at.date }}">
                            @{{ content.published_at_diff }}
                        </time>
                    </td>
                    <td>
                        <span v-repeat="tag in content.tags" class="label label-default" style="background-color: #@{{ tag.color.hex }}">
                            @{{ tag.name }}
                        </span>
                    </td>
                    <td>@{{ content.author }}</td>
                    <td>@{{ content.last_editor || '-' }}</td>
                </tr>
            </table>
        </div>
    </div>
@stop