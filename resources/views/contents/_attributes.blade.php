{!! Form::hidden('id') !!}
<div class="form-group">
    <label for="title" class="sr-only">Title</label>
    {!! Form::text('title', null, [
        'class' => 'form-control',
        'placeholder' => 'What is this about?',
        'v-model' => 'title',
        'v-on:keyup' => 'makeSlug'
    ]) !!}
    <p class="help-block text-right" v-show="autoSlug" v-on:click="autoSlug = false">
        {{ url() }}/@{{slug}}
    </p>
</div>

<div class="form-group" v-show="!autoSlug" @hide>
    <label for="slug">Slug</label>
    <div class="input-group">
        <div class="input-group-addon">
            <label>
                <input type="checkbox" name="autoSlug" id="autoSlug" v-model="autoSlug"> Automatic
            </label>
        </div>
        {!! Form::text('slug', null, [
            'class' => 'form-control',
            'v-model' => 'slug'
        ]) !!}
    </div>
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
                    {!! Form::select('tags[]', $tags, $content->tags()->lists('id')->all(), ['class' => 'form-control']) !!}
                @else
                    {!! Form::select('tags[]', $tags, null, ['class' => 'form-control']) !!}
                @endexists
            </div>
        </div>

        <div class="pull-right">
            <button type="submit" class="btn btn-default navbar-btn">@icon('send') Save &amp; Publish</button>
            <button type="submit" class="btn btn-success navbar-btn">@icon('floppy-disk') Save</button>
        </div>
    </div>
</nav>