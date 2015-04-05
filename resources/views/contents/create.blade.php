@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="col-md-12">
            @include('errors')

            {!! Form::open(['method' => 'post', 'route' => 'i.contents.store']) !!}
                @include('contents._attributes')
            {!! Form::close() !!}
        </div>
    </div>
@stop