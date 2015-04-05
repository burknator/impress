@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="row" id="content-list">
                    @foreach ($contents as $content)
                        <div class="col-md-12">
                            <a href="{{ route('i.contents.edit', [$content->slug]) }}">
                                <span class="title">{{ $content->title }}</span>
                                <span class="published_at">published at {{ $content->published_at->format('d.m.Y') }}</span>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div id="content-preview" class="col-md-9">
                <div class="row">
                    <div class="col-md-5">
                        <p><a href="#">You</a> created this post <b>two days ago</b>.<br>It was last edited <b>yesterday</b> by <a href="#">John Doe</a>.</p>

                    </div>
                    <div class="col-md-7">
                        <div class="pull-right">
                            <a href="" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit this post</a>
                            <a href="" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <hr>
                </div>
                <h1>Nabend.</h1>
                <p>
                    Ich bin ein kleiner Beispiel-Post.
                </p>
            </div>
        </div>
    </div>
@stop