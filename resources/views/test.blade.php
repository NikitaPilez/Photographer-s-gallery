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
		<div class="col-md-4 center margin-description-services">
			@if(App::getLocale() == "en")
			<h4>{{$service->name}}</h4>
			@else
			<h4>{{$service->nameRus}}</h4>
			@endif
			<a data-lightbox="{{$service->photo}}" data-title="{{$service->name}}." href="{{asset('uploads/'.$service->photo)}}">
				<img class="img-fluid" src="{{asset('uploads/'.$service->photo)}}" alt="">
			</a>
			<p> 
				@foreach($service->descriptions as $tmp)
				<h7>
					<br>
					- {{$tmp->description}} 
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
						<a href="{{asset('uploads/'.$one->photo)}}" onclick="$('#tmp').close()" data-lightbox="{{$service->name}}">
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
							<h5 class="label-color">Name*
								<input  name="name" id="nameCustom" class="field-model form-control" required placeholder="Enter name">
								<span class="help-block">
									<strong class="nameCustom"></strong>
								</span>
							</h5>
						</div>
						<h5 class="label-color">Type fotosession*
							<select name="type" id="typeOrder" class="field-model form-control">
								@foreach($services as $service)
								<option>{{$service->name}}</option>
								@endforeach
							</select>
						</h5>
					</div>
					<div class="form-group">
						<h5 class="label-color">Phone*
							<input type="numeric" id="phoneCustom" name="phone" required class="field-model form-control" placeholder="Phone">
							<span class="help-block">
								<strong class="phoneCustom"></strong>
							</span>
						</h5>
					</div>
					<div class="form-group">
						<h5 class="label-color">Date*
							<input type="date" name="date" id="dateOrder" required class="field-model form-control" placeholder="Date">
							<span class="help-block">
								<strong class="dateOrder"></strong>
							</span>
						</h5>
					</div>
					<div class="center"><a id="sendOrder" class="btn btn-default btn-xs btn-model margin-btn-services btn-anim">
						Send
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