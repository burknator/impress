<h4>Edit category</h4>

@include('errors')

{!! Form::model($category, ['method' => 'put', 'route' => ['i.categories.update', $category->slug], 'class' => 'form-horizontal', 'id' => 'i-categories-edit']) !!}
    @include('categories._attributes', ['cancelButton' => true])
{!! Form::close() !!}