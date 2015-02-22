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
    {!! Form::select('type_id', $types, null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>