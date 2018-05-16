@extends('admin.layouts.master')

@section('content')

<div class="row">
    <div class="col-sm-10 col-sm-offset-2">
        <h1>{{ trans('quickadmin::templates.templates-view_create-add_new') }}</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
           <ul>
            {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
        </ul>
    </div>
    @endif
</div>
</div>

{!! Form::open(array('files' => true, 'route' => config('quickadmin.route').'.reviews.store', 'id' => 'form-with-validation', 'class' => 'form-horizontal')) !!}

<div class="form-group">
    {!! Form::label('name', 'name', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('name', old('name'), array('class'=>'form-control')) !!}
        
    </div>
</div>

<div class="form-group">
    {!! Form::label('nameRus', 'nameRus', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('nameRus', old('nameRus'), array('class'=>'form-control')) !!}
        
    </div>
</div>

<div class="form-group">
    {!! Form::label('description', 'description', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('description', old('description'), array('class'=>'form-control')) !!}
        
    </div>
</div>

<div class="form-group">
    {!! Form::label('descriptionRus', 'descriptionRus', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('descriptionRus', old('descriptionRus'), array('class'=>'form-control')) !!}
        
    </div>
</div>

<div class="form-group">
    {!! Form::label('display', 'display', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('display', $display, old('display'), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('photo', 'photo', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::file('photo') !!}
        {!! Form::hidden('photo_w', 4096) !!}
        {!! Form::hidden('photo_h', 4096) !!}
        
    </div>
</div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit( trans('quickadmin::templates.templates-view_create-create') , array('class' => 'btn btn-primary')) !!}
  </div>
</div>

{!! Form::close() !!}

@endsection