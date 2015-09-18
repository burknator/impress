<h4>Create new category</h4>

@include('errors')

{!! Form::open(['method' => 'post', 'route' => 'i.categories.store', 'class' => 'form-horizontal']) !!}
    @include('categories._attributes')
{!! Form::close() !!}