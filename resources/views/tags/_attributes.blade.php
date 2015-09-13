{!! Form::hidden('id') !!}

<div class="form-group">
    <label for="name">Name</label>
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label for="slug">Slug</label>
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>

@foreach($colors as $color)
    <div class="radio-inline" style="background-color: #{{ $color->hex }}">
        <label>
            {!! Form::radio('color_id', $color->id) !!} {{ $color->hex }}
        </label>
    </div>
@endforeach

<div class="row">
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</div>