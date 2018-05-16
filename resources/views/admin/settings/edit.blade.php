@extends('admin.layouts.master')

@section('content')

<div class="row">
    <div class="col-sm-10 col-sm-offset-2">
        <h1>{{ trans('quickadmin::templates.templates-view_edit-edit') }}</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                </ul>
        	</div>
        @endif
    </div>
</div>

{!! Form::model($settings, array('files' => true, 'class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.settings.update', $settings->id))) !!}

<div class="form-group">
    {!! Form::label('copyright', 'copyright', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('copyright', old('copyright',$settings->copyright), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('vk', 'vk', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('vk', old('vk',$settings->vk), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('instagram', 'instagram', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('instagram', old('instagram',$settings->instagram), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('fivehundredpx', 'fivehundredpx', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('fivehundredpx', old('fivehundredpx',$settings->fivehundredpx), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('youtube', 'youtube', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('youtube', old('youtube',$settings->youtube), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('phone', 'phone', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('phone', old('phone',$settings->phone), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('email', 'email', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('email', old('email',$settings->email), array('class'=>'form-control')) !!}
        
    </div>
</div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
      {!! link_to_route(config('quickadmin.route').'.settings.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection