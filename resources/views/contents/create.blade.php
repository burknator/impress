@extends('app')

@section('content')
<div class="container">
    {!! Form::open(['method' => 'post', 'route' => 'i.contents.store']) !!}
    <div class="form-group">
        <label for="title">Title</label>
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        <label for="text">Body</label>
        {!! Form::textarea('text', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        <label for="slug">Slug</label>
        {!! Form::text('slug', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        <label for="type">Type</label>
        {!! Form::select('type', $types, null, ['multiple' => '', 'class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    {!! Form::close() !!}
</div>
@stop