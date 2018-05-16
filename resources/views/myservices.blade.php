@extends('base')
@section('scripts')
@parent
<script type="text/javascript">
	$('.services-id').click(function(e){
		$('#order').modal({show:true});
		$.ajaxSetup({
			headers:{
				'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
			},type:"get"
		});

		$.ajax({
			url:"/sendorder",
			data: "id=" + $(this).attr('data-id'),
			beforeSend:function(){
				
			},
			success:function(data){
				$('#selectenter').html(data);
			}, 
			error:function(xhr){

			}
		});

	});
</script>
@endsection
@section('content')

<div class="container container-services">
	<div class="row">
		@foreach($services as $service)
		<div class="col-md-4 center margin-description-services mask">
			@if(App::getLocale() == "en")
			<h4 style="height: 50px">
				{{$service->name}}
			</h4>
			<a data-lightbox="{{$service->photo}}"  data-title="{{$service->name}}" href="{{asset('uploads/'.$service->photo)}}">
				<img class="img-fluid" src="{{asset('uploads/'.$service->photo)}}" alt="">
			</a>
			@else
			<h4>{{$service->nameRus}}</h4>
			<a data-lightbox="{{$service->photo}}"  data-title="{{$service->nameRus}}" href="{{asset('uploads/'.$service->photo)}}">
				<img class="img-fluid" src="{{asset('uploads/'.$service->photo)}}" alt="">
			</a>
			@endif
			<p>
				@foreach($service->descriptions as $tmp)
				<h7>
					<br>
					@if(App::getLocale() == "en")
					- {{$tmp->description}} 
					@else
					- {{$tmp->descriptionRus}} 
					@endif
				</h7>
				@endforeach
			</p>
			<strong>
				<h2>@lang('dictionary.price') {{$service->price}}$
				</h2>
			</strong>

			<a href="{{asset('uploads/'.$service->photo)}}" class="btn btn-default btn-xs btn-services margin-btn-services btn-anim" data-lightbox="{{$service->name}}">
				@lang('dictionary.seeWork')
			</a>	
			<div>
				<a data-id="{{$service->id}}" class="btn btn-default btn-xs btn-services margin-btn-services btn-anim services-id">
					@lang('dictionary.order')
				</a>
			</div>
		</div>
		@endforeach 
	</div>
</div>

<footer>
	<div class="container text-center">
		<p>Copyright &copy; {{$settings->copyright}}</p>
	</div>
</footer>

<div id="tmp" class="modal fade">
	<div class="modal-dialog">
		<div class="black-modal">
			<div class="modal-body">
				<div class="row" >
					@foreach($services as $service)
					@foreach($service->photos as $one)
					<div class="col-md-4">
						<a href="{{asset('uploads/'.$one->photo)}}" data-lightbox="{{$service->name}}">
							<img class="img-fluid" src="{{asset('uploads/'.$one->photo)}}"  alt="">
						</a>
					</div>
					@endforeach
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>

<div id="order" class="modal fade">
	<div class="modal-dialog">
		<div class="black-modal">
			<div class="modal-body">
				<button class="close" type="button" data-dismiss="modal">×
				</button>
				<form action="{{asset('sendorder')}}" method="get">
					{!! csrf_field(); !!}
					<div class="form-group">
						<div class="form-group">
							<h5 class="label-color">@lang('dictionary.name')*
								<input  name="name" id="nameCustom" class="field-model form-control" required placeholder="@lang('dictionary.yourName')">
								<span class="help-block">
									<strong class="nameCustom"></strong>
								</span>
							</h5>
						</div>
						<h5 class="label-color">@lang('dictionary.typePhotosession')*
							<div id="selectenter">
							</div>
						</h5>
					</div>
					<div class="form-group">
						<h5 class="label-color">@lang('dictionary.phone')*
							<input type="numeric" id="phoneCustom" name="phone" required class="field-model form-control" placeholder="+375-(29)-777-77-77">
							<span class="help-block">
								<strong class="phoneCustom"></strong>
							</span>
						</h5>
					</div>
					<div class="form-group">
						<h5 class="label-color">@lang('dictionary.date')*
							<input type="date" lang="{{App::getLocale()}}" name="date" id="dateOrder" required class="field-model form-control" placeholder="Date">
							<span class="help-block">
								<strong class="dateOrder"></strong>
							</span>
						</h5>
					</div>
					<div class="center">
						<a id="sendOrder" class="btn btn-default btn-xs btn-model margin-btn-services btn-anim">
							@lang('dictionary.send')
						</a>
						<div>
							<span class="help-block" >
								<strong class="sendordersuc"></strong>
							</span>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div> 

@endsection