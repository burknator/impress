<h4>Edit tag</h4>

@include('errors')

{!! Form::model($tag, ['method' => 'put', 'route' => ['i.tags.update', $tag->slug], 'class' => 'form-horizontal', 'id' => 'i-tags-edit']) !!}
    @include('tags._attributes', ['cancelButton' => true])
{!! Form::close() !!}
