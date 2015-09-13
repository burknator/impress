{!! Form::hidden('id') !!}

<div class="form-group">
	<label for="name" class="control-label">Name</label>
	{!! Form::text('name', null, ['class' => 'form-control col-md-12']) !!}
</div>

<div class="form-group">
	<label for="slug" class="control-label">Slug</label>
	{!! Form::text('slug', null, ['class' => 'form-control col-md-12']) !!}
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