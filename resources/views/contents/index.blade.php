@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div id="content-list" class="col-md-4">
                @foreach ($contents as $content)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-1">
                                    <input type="checkbox" name="" id="">
                                </div>
                                <div class="col-md-6">
                                    <span class="glyphicon glyphicon-user"></span>&nbsp;Patrick Burke
                                </div>
                                <div class="col-md-5">Today, 12:15 am</div>
                            </div>
                            <div class="row">
                                <div class="col-md-11 col-md-offset-1">
                                    <b>{{ $content->title }}</b><br>
                                    {{ str_limit(strip_tags($content->text), 100) }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div id="content-preview" class="col-md-8">
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
                    <div class="col-md-5">
                        Category: <a href="">Life and everything</a><br>
                        Tags: <a href="" class="label label-warning">dummy</a> <a href="" class="label label-success">pulp</a>
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