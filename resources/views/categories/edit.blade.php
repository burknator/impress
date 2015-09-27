<h4>Edit category</h4>

@include('errors')

{!! Form::model($category, ['route' => ['i.categories.update', $category->slug], 'method' => 'put', 'class' => 'form-horizontal']) !!}
    @include('categories._attributes')
{!! Form::close() !!}
