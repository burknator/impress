@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div id="content-list" class="col-md-4">
                @forelse ($contents as $content)
                    <div class="row content-entry">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-1">
                                    <input type="checkbox" name="" id="{{ $content->id }}">
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
                @empty
                    <div class="row">
                        <div class="col-md-12">No contents yet.</div>
                    </div>
                @endforelse
            </div>
            <div id="content-preview" class="col-md-8">
                <div class="row">
                    <div class="col-md-1">
                        <a href="#" class="pull-right"><span class="glyphicon glyphicon-pencil"></span></a>
                    </div>
                    <div class="col-md-9">
                        <p>
                            Created <b>two days ago</b> by <a href="#">you</a>, in <a href="#">Sample category</a>. Last edited <b>yesterday</b> by <a href="#">John Doe</a>.
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
                <h1>Nabend.</h1>
                <p>
                    Ich bin ein kleiner Beispiel-Post.
                </p>
            </div>
        </div>
    </div>
@stop