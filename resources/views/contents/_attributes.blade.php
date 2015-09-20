{!! Form::hidden('id') !!}
<div class="form-group">
    <label for="title" class="sr-only">Title</label>
    {!! Form::text('title', null, [
        'class' => 'form-control',
        'placeholder' => 'What is this about?'
    ]) !!}
    <p class="help-block text-right">
        <span id="slug-preview">what-is-this-about</span>
    </p>
</div>

<div class="form-group hidden">
    <label for="slug" class="sr-only">Slug</label>
    {!! Form::text('slug', null, [
        'class' => 'form-control'
    ]) !!}
</div>

<div class="row">
    <div class="col-md-12">
        <label for="text" class="sr-only">Text</label>
        {!! Form::textarea('text', null, [
            'class' => 'form-control',
            'placeholder' => 'Dickens quotes?'
        ]) !!}
    </div>
</div>

<nav class="navbar navbar-default navbar-fixed-bottom">
    <div class="container-fluid">
        <div class="navbar-form navbar-left">
            <div class="form-group">
                <label for="type_id">Type</label>
                {!! Form::select('type_id', $types, null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                <label for="category_id">Category</label>
                {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                <label for="tags">Tags</label>

                @exists ($content)
                    {!! Form::select('tags[]', $tags, $content->tags()->lists('id')->all(), ['class' => 'form-control', 'multiple' => true]) !!}
                @else
                    {!! Form::select('tags[]', $tags, null, ['class' => 'form-control']) !!}
                @endexists
            </div>
        </div>

        <div class="pull-right">
            <button type="submit" class="btn btn-default navbar-btn">@icon('send') Save & Publish</button>
            <button type="submit" class="btn btn-success navbar-btn">@icon('floppy-disk') Save</button>
        </div>
    </div>
</nav>