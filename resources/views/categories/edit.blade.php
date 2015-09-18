<h4>Edit category</h4>

@include('errors')

{!! Form::model($category, ['method' => 'put', 'route' => ['i.categories.update', $category->slug], 'class' => 'form-horizontal']) !!}
    @include('categories._attributes')
{!! Form::close() !!}