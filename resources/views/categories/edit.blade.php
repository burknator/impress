<h4>Edit category</h4>

@include('errors')

<form method="post" action="@{{ category.update_link }}" class="form-horizontal" id="i-categories-edit">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    @include('categories._attributes')
</form>