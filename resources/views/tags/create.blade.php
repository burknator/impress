<h4>Create new tag</h4>

@include('errors')

{!! Form::open(['method' => 'post', 'route' => 'i.tags.store', 'class' => 'form-horizontal', 'id' => 'i-tags-edit']) !!}
    @include('tags._attributes')
{!! Form::close() !!}
