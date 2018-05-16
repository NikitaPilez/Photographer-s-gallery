@extends('base')
@section('content')

<div class="container container-services center">
	<h2>@lang('dictionary.contactUs')</h2>
	<div class="row">
		<div class="col-md-12 ">
			<form class="form-horizontal" action="{{asset('sendsms')}}" method="POST">
				{!! csrf_field(); !!}
				<div class="form-group">
					<label for="exampleInputName2">@lang('dictionary.name')*</label>
					<input type="text" name="name" class="form-control" placeholder="@lang('dictionary.yourName')">
					@if ($errors->has('name'))
					<span class="help-block">
						<strong>
							{{ $errors->first('name') }}
						</strong>
					</span>
					@endif
				</div>
				<div class="form-group">
					<label for="exampleInputPhone2">@lang('dictionary.phone')*</label>
					<input type="numeric" name="phone" class="form-control" placeholder="+375-(29)-777-77-77">
					@if ($errors->has('phone'))
					<span class="help-block">
						<strong>{{ $errors->first('phone') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group">
					<label for="exampleInputEmail2">@lang('dictionary.email')</label>
					<input type="email" name="email" class="form-control" placeholder="@lang('dictionary.yourEmail')">
				</div>
				<div class="form-group ">
					<label for="exampleInputText">@lang('dictionary.yourMessage')*</label>
					<textarea name="description"  class="form-control" placeholder="@lang('dictionary.testMessage')"></textarea> 
					@if ($errors->has('description'))
					<span class="help-block">
						<strong>{{ $errors->first('description') }}</strong>
					</span>
					@endif
				</div>
<!-- 				<div id="#success-contact" class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
						Your message was successfully sent
					</div> -->
					@if (Session::has('success'))
					<div id="#success-contact" class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span></button>
							{{ Session::get('success') }}
						</div>
						@endif
						<button type="submit" class="btn btn-default btn-anim">@lang('dictionary.sendMessage')</button>
					</form>
			<hr><!-- 
			<h3>Our Social Sites</h3> -->
			<div class="row">
				<div class="col-lg-4 ml-auto text-center color-default">
					<i class="fa fa-phone fa-3x sr-contact"></i>
					<p>
						<a class="color-default" href="tel:+{{$settings->phone}}">{{$settings->phone}}</a>
					</p>
				</div>
				<div class="col-lg-4 mr-auto text-center color-default">
					<i class="fa fa-envelope-o fa-3x sr-contact"></i>
					<p>
						<a class="color-default" href="mailto:{{$settings->email}}">{{$settings->email}}</a>
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<a href="{{$settings->vk}}" class="btn-contact-min btn btn-contact btn-default btn-xs margin-btn-services btn-anim">
						<i class="fa fa-vk"> vkontakte</i>
					</a>
				</div>
				<div class="col-md-3">
					<a href="{{$settings->instagram}}" class="btn-contact-min btn btn-contact btn-default btn-xs margin-btn-services btn-anim">
						<i class="fa fa-instagram"> instagram</i>
					</a>
				</div>

				<div class="col-md-3">
					<a href="#" class="btn-contact-min btn btn-contact btn-default btn-xs margin-btn-services btn-anim">
						<i class="fa fa-youtube"> youtube</i>
					</a>
				</div>

				<div class="col-md-3">
					<a href="{{$settings->fivehundredpx}}" class="btn-contact-min btn btn-contact btn-default btn-xs margin-btn-services btn-anim">
						<i class="fa fa-photo"> 500px</i>
					</a>
				</div>

			</div>
		</div>
	</div>
</div>
<footer>
	<div class="container text-center">
		<p>Copyright &copy; {{$settings->copyright}}</p>
	</div>
</footer>

@endsection