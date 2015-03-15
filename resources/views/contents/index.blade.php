@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <ul id="content-list">
                    @foreach ($contents as $content)
                        <li data-id="{{ $content->id }}">
                            <span class="title">{{ $content->title }}</span>
                            <span class="published_at">published at {{ $content->published_at->format('d.m.Y') }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div id="content-preview" class="col-md-9">
                <div id="content-preview-placeholder">
                    <h1>Content preview</h1>
                    <p>
                        Select a post or a page to your left-handside.
                    </p>
                </div>
            </div>
        </div>
    </div>
@stop