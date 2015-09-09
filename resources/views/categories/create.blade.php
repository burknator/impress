@extends('app')

@section('foot-scripts')
    @parent

    <script>
        System.import('js/components/category/create').then(function(CreateCategory) {
            CreateCategory.setState({'test': true});
            CreateCategory.render(document.getElementById('create-category'));
        });
    </script>
@stop

@section('content')
    <div id="create-category" class="container"></div>
@stop