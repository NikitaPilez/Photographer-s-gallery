@extends('base')
@section('content')
<div class="container container-reviews">
	<div class="row center">
		<div class="col-md-12">
			<h3 class="center">
				@lang('dictionary.reviews')
			</h3>
		</div>
	</div>
	@foreach($reviews as $review)
	<div class="row margin-reviews vertical-align-img mask">
		<div class="col-md-6 center">	
			@if(App::getLocale() == 'en')
			<h5>{{$review->name}}</h5>
			@else
			<h5>{{$review->nameRus}}</h5>
			@endif	
			<div class="margin-description-reviews">
				@if(App::getLocale() == 'en')
				{{$review->description}}
				@else
				{{$review->descriptionRus}}
				@endif
			</div>
		</div>
		<div class="col-md-6 center ">
			<a data-lightbox="{{$review->name}}" href="{{asset('uploads/'.$review->photo)}}">
				<img class="img-fluid " src="{{asset('uploads/'.$review->photo)}}"  alt="">
			</a>
		</div>
	</div>
	@endforeach
	<div class="pagination-center">
		{{$reviews->links()}}
	</div>
	<div class="center">
		<a href="{{asset('contacts')}}" class="center btn btn-default btn-xs btn-services margin-btn-services btn-anim services-id">
			@lang('dictionary.sendReview')
		</a>
	</div>
</div>

<footer>
	<div class="container text-center">
		<p>Copyright &copy; {{$settings->copyright}}</p>
	</div>
</footer>

@endsection