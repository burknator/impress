@extends('app')

@section('content')
    {!! Form::open(['method' => 'put', 'route' => 'i.settings.update', 'class' => 'form-horizontal', 'id' => 'i-settings-edit']) !!}
        <div class="form-group">
            <div class="col-md-12">
                <input type="text" id="search" placeholder="Search... (F)" class="form-control">
            </div>
        </div>

        <h4>Basic Informations</h4>
        <hr>

        <div class="form-group">
            <label for="title" class="col-md-3 control-label">Blog title</label>

            <div class="col-md-5">
                <input type="text" name="title" id="title" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="description" class="col-md-3 control-label">Blog Description</label>

            <div class="col-md-5">
                <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
            </div>
        </div>

        <div class="form-group">
            <label for="page-title-format" class="col-md-3 control-label">Page Title Format</label>

            <div class="col-md-5">
                <input type="text" name="page-title-format" id="page-title-format" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="url-format" class="col-md-3 control-label">URL Format</label>

            <div class="col-md-5">
                <input type="text" name="url-format" id="url-format" class="form-control">
            </div>
        </div>

        <h4>Writing</h4>
        <hr>

        <div class="form-group">
            <label for="autosave-enable" class="col-md-3 control-label">Enable Autosave</label>
            <div class="col-md-5">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="autosave-enable" id="autosave-enable" v-model="autosave.enabled">
                        Save the content automatically while writing
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group" v-if="autosave.enabled">
            <label for="autosave-interval" class="col-md-1 col-md-offset-3 control-label">Every</label>

            <div class="col-md-1">
                <input type="number" name="autosave-interval" id="autosave-interval" class="form-control" placeholder="3">
            </div>

            <div class="col-md-3">
                <select name="autosave-unit" id="autosave-unit" class="form-control">
                    <option value="words">Words</option>
                    <option value="seconds">Seconds</option>
                    <option value="minutes">Minutes</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="dickens-enable" class="col-md-3 control-label">Enable Dickens</label>
            <div class="col-md-5">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="dickens-enable" id="dickens-enable">
                        Dickens will help you write in a good way. He will check your text against known best practices
                        while you write.
                    </label>
                </div>
            </div>
        </div>

        <h4>Time and Date</h4>
        <hr>

        <div class="form-group">
            <label for="timezone" class="col-md-3 control-label">Timezone</label>

            <div class="col-md-5">
                <select name="timezone" id="timezone" class="form-control" v-model="timezone">
                    @foreach($timezoneList as $offset => $cities)
                        <optgroup label="{{ $offset }}">
                            @foreach($cities as $id => $city)
                                <option value="{{ $id }}" @selected(config('app.timezone') == $id)>{{ $city }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
                <p class="help-block">
                    This is used for... This was automatically detected during the installation.
                </p>
            </div>

            <div class="col-md-3">
                <button type="button" class="btn btn-default" v-on="click: redetectTimezone">@icon('refresh') Re-detect now</button>
            </div>
        </div>

        <div class="form-group">
            <label for="date-format" class="col-md-3 control-label">Date format</label>

            <div class="col-md-5">
                <input type="text" name="date-format" id="date-format" class="form-control">
                <p class="help-block">
                    This is used for...
                </p>
            </div>
        </div>

        <div class="form-group">
            <label for="time-format" class="col-md-3 control-label">Time format</label>

            <div class="col-md-5">
                <input type="text" name="time-format" id="time-format" class="form-control">
                <p class="help-block">
                    This is used for...
                </p>
            </div>
        </div>

        <h4>Danger Zone</h4>
        <hr>

        <div class="form-group">
            <div class="col-md-5 col-md-offset-3">
                <a href="#" class="btn btn-danger">Activate Maintenance Mode</a>
                <p class="help-block">
                    No body except you will be able to view the blog's contents.
                </p>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-5 col-md-offset-3">
                <a href="#" class="btn btn-danger">Delete everything</a>
                <p class="help-block">
                    The factory reset. Because sometimes you just need to start over.
                </p>
            </div>
        </div>

        <hr>

        <div class="form-group">
            <div class="col-md-12">
                <div class="pull-right">
                    <button type="submit" class="btn btn-success">@icon('ok') Save</button>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
@stop