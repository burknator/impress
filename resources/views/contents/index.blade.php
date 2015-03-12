@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12">
                        sorting/filtering
                    </div>
                </div>
                @foreach($contents as $content)
                    <div class="row">
                        <div class="col-md-12">
                            <span>{{ $content->title }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-9">
                <h1>Content preview</h1>
            </div>
        </div>
    </div>
@stop