@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @forelse($contents as $content)
                    <ul>
                        <li>{{ $content->title }}</li>
                    </ul>
                @empty
                    <h3>Go ahead, <a href="{!! route('i.contents.create') !!}">do something</a>!</h3>
                @endforelse
            </div>
        </div>
    </div>
@stop