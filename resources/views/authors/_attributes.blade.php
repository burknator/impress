{!! Form::hidden('id') !!}
<div class="authors-form">
    <div class="form-group">
        {!! Form::text('email', null, ['class' => 'form-control col-md-12']) !!}
        <label for="email" class="control-label">E-Mail address of this author.</label>
    </div>
    <div class="form-group">
        {!! Form::password('password', ['class' => 'form-control col-md-12', 'placeholder' => 'Password']) !!}
    </div>
    <div class="form-group">
        {!! Form::password('password_confirmation', ['class' => 'form-control col-md-12', 'placeholder' => 'Confirm password.']) !!}
        <label for="password" class="control-label">Fill these only if you wish to change the password.</label>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</div>
