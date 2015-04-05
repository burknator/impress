<div class="category-form">
	<div class="form-group">
		<input type="text" name="name" id="name" class="col-md-12 form-control">
		<label for="name" class="control-label">Name your new category.</label>
	</div>
	<div class="form-group">
		<input type="text" name="slug" id="slug" class="col-md-12 form-control">
		<label for="slug" class="control-label">The URL-friendly version will be generated automatically.</label>
	</div>
	<div class="row">
		<div id="color-palette" class="col-md-12">
			@foreach($colors as $color)
				<label for="color_{{ $color->id }}" style="background-color: #{{ $color->hex }}">
					<input type="radio" name="color_id" id="color_{{ $color->id }}" value="{{ $color->id }}">
				</label>
			@endforeach
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<button type="submit" class="btn btn-primary center-block">Save</button>
		</div>
	</div>
</div>
