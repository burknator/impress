{!! Form::hidden('id') !!}

<div class="form-group">
    <label for="name" class="col-md-3 control-label">Name</label>

    <div class="col-md-9">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <label for="slug" class="col-md-3 control-label">Slug</label>

    <div class="col-md-9">
        {!! Form::text('slug', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <label for="color_id" class="col-md-3 control-label">Color</label>

    <div class="col-md-9">
        @foreach($colors as $color)
            <div class="radio-inline" style="background-color: #{{ $color->hex }}">
                <label>
                    {!! Form::radio('color_id', $color->id) !!} {{ $color->hex }}
                </label>
            </div>
        @endforeach
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="pull-right">
            @if (isset($cancelButton) && $cancelButton)
                <a href="{{ route('i.tags.index') }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
            @endif
            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Save</button>
        </div>
    </div>
</div>