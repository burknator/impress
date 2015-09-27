<h4>Edit tag</h4>

@include('errors')

{!! Form::model($tag, ['route' => ['i.tags.update', $tag->slug], 'method' => 'put', 'class' => 'form-horizontal']) !!}
    @include('tags._attributes')
{!! Form::close() !!}
