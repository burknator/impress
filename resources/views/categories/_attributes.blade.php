<div class="form-group">
    <label for="name">Name</label>
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    <label for="color">Color</label>
    {!! Form::select('color_id', $colors, null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>