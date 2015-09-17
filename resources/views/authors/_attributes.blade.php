{!! Form::hidden('id') !!}

<div class="form-group">
    <label for="email" class="control-label">E-Mail address</label>
    {!! Form::text('email', null, ['class' => 'form-control col-md-12']) !!}
</div>

<div class="form-group">
    <label for="password" class="control-label">Password</label>
    {!! Form::password('password', ['class' => 'form-control col-md-12', 'placeholder' => 'Password']) !!}
</div>

<div class="form-group">
    {!! Form::password('password_confirmation', ['class' => 'form-control col-md-12', 'placeholder' => 'Confirm password.']) !!}
</div>

<div class="row">
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</div>
