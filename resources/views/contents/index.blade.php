@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div id="content-list" class="col-md-4">
                @foreach ($contents as $content)
                    <div class="row content-entry">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-1">
                                    <input type="checkbox" name="" id="{{ $content->id }}">
                                </div>
                                <div class="col-md-6">
                                    <span class="glyphicon glyphicon-user"></span>&nbsp;{{ $content->author->email }}
                                </div>
                                <div class="col-md-5">{{ $content->created_at }}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-11 col-md-offset-1">
                                    <a href="{{ route('i.contents.index') }}?preview={{ $content->id }}"><b>{{ $content->title }}</b></a><br>
                                    {{ str_limit(strip_tags($content->text), 100) }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div id="content-preview-container" class="col-md-8">
                @if ($preview)
                    <div class="row">
                        <div class="col-md-1">
                            <a href="{{ route('i.contents.edit', ['contents' => $preview->slug]) }}" class="pull-right"><span class="glyphicon glyphicon-pencil"></span></a>
                        </div>
                        <div class="col-md-9">
                            <p>
                                Created <b>{{ $preview->created_at->diffForHumans() }}</b>
                                by <a href="#">{{ $preview->author->email }}</a>@if ($preview->category), in <a href="#">{{ $preview->category->name }}</a>@endif.
                                @if ($preview->lastEditor)
                                    Last edited <b>{{ $preview->updated_at->diffForHumans() }}</b> by <a href="#">{{ $preview->lastEditor->email }}</a>.
                                @endif
                            </p>
                        </div>
                        <div class="col-md-2">
                            <div class="pull-right">
                                <a href="" class="text-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9 col-md-offset-1">
                            <a href="" class="label label-default">dummy</a> <a href="" class="label label-default">pulp</a>
                        </div>
                    </div>
                    <div class="row">
                        <hr>
                    </div>
                    <div id="content-preview-body">{!! $preview->text !!}</div>
                @endif
            </div>
        </div>
    </div>
@stop