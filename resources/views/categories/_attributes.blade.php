<div class="category-form">
	<div class="form-group">
		{!! Form::text('name', null, ['class' => 'form-control col-md-12']) !!}
		<label for="name" class="control-label">Name your new category.</label>
	</div>
	<div class="form-group">
		{!! Form::text('slug', null, ['class' => 'form-control col-md-12']) !!}
		<label for="slug" class="control-label">The URL-friendly version will be generated automatically.</label>
	</div>
	<div class="row">
		<div id="color-palette" class="col-md-12">
			@foreach($colors as $color)
				<label for="color_{{ $color->id }}" style="background-color: #{{ $color->hex }}">
					{!! Form::radio('color_id', $color->id, ['id' => 'color_' . $color->id]) !!}
				</label>
			@endforeach
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<button type="submit" class="btn btn-primary">Save</button>
		</div>
	</div>
</div>
