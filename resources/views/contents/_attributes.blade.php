@section('foot-scripts')
    <script src="/js/markdown-it.js"></script>
    <script src="/js/codemirror.js"></script>
    <script src="/js/mode/markdown.js"></script>
    @parent
@stop

@section('head-styles')
    @parent
    <link rel="stylesheet" href="/css/codemirror.css">
@stop

<div class="form-group">
    <label for="title">Title</label>
    {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'content-title']) !!}
</div>

<div class="form-group">
    <label for="slug">Slug</label>
    {!! Form::text('slug', null, ['class' => 'form-control', 'id' => 'content-slug']) !!}
</div>

<div class="row">
    <div class="col-md-6">
        <label for="text">Body</label>
        {!! Form::textarea('text', null, ['class' => 'form-control', 'id' => 'content-input']) !!}
    </div>
    <div class="col-md-6">
        <label for="preview">Preview</label>
        <div id="content-preview"></div>
    </div>
</div>

<div class="form-group">
    <label for="type_id">Type</label>
    {!! Form::select('type_id', $types, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label for="category_id">Category</label>
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>